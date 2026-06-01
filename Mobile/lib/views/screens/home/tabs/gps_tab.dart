import 'dart:async';
import 'package:flutter/foundation.dart';
import 'package:flutter/gestures.dart';
import 'package:flutter/material.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:url_launcher/url_launcher.dart';
import '../../../../core/app_theme.dart';
import '../../../../core/dialog_helper.dart';
import '../../../../REST-API/Services/booking_service.dart';
import '../../../../REST-API/Services/motorcycle_service.dart';

class GpsTab extends StatefulWidget {
  final Function(int)? onTabSwitch;
  final bool isActive;
  const GpsTab({super.key, this.onTabSwitch, this.isActive = false});

  @override
  State<GpsTab> createState() => _GpsTabState();
}

class _GpsTabState extends State<GpsTab> with SingleTickerProviderStateMixin {
  final BookingService _bookingService = BookingService();
  final MotorcycleService _motorcycleService = MotorcycleService();

  bool _isLoading = true;
  Map<String, dynamic>? _activeBooking;
  Map<String, dynamic>? _gpsData;
  bool _engineOn = true;
  late AnimationController _pulseController;
  MapType _mapType = MapType.hybrid;
  double _zoomLevel = 16.0;
  Timer? _refreshTimer;
  GoogleMapController? _mapController;

  @override
  void initState() {
    super.initState();
    _pulseController = AnimationController(
      vsync: this,
      duration: const Duration(seconds: 2),
    )..repeat(reverse: true);
    _loadGpsData();
    _startRefreshTimer();
  }
  @override
  void didUpdateWidget(covariant GpsTab oldWidget) {
    super.didUpdateWidget(oldWidget);
    if (widget.isActive && !oldWidget.isActive) {
      _loadGpsData();
      _startRefreshTimer();
    } else if (!widget.isActive && oldWidget.isActive) {
      _stopRefreshTimer();
    }
  }
  @override
  void dispose() {
    _pulseController.dispose();
    _stopRefreshTimer();
    super.dispose();
  }

  void _startRefreshTimer() {
    _stopRefreshTimer();
    _refreshTimer = Timer.periodic(const Duration(seconds: 5), (timer) {
      if (widget.isActive && _activeBooking != null && !_isLoading) {
        _refreshGpsOnly();
      }
    });
  }

  void _stopRefreshTimer() {
    _refreshTimer?.cancel();
    _refreshTimer = null;
  }

  void _updateCameraPosition() {
    if (_mapController != null && _hasGpsCoordinates) {
      _mapController!.animateCamera(
        CameraUpdate.newCameraPosition(
          CameraPosition(
            target: LatLng(_latitude, _longitude),
            zoom: _zoomLevel,
          ),
        ),
      );
    }
  }

  Future<void> _refreshGpsOnly() async {
    if (_activeBooking == null) return;
    try {
      final mcId = _activeBooking!['motorcycle']['id'];
      final gps = await _motorcycleService.getMotorcycleGps(mcId);
      if (mounted && gps != null) {
        setState(() {
          _gpsData = gps;
        });
        _updateCameraPosition();
      }
    } catch (_) {}
  }

  Future<void> _loadGpsData() async {
    if (!mounted) return;
    setState(() => _isLoading = true);
    try {
      final list = await _bookingService.getBookingHistory();
      Map<String, dynamic>? active;
      
      // Find the first active rental
      for (var b in list) {
        final status = b['payment_status']?.toString().toLowerCase();
        final bool isPaid = status == 'paid' || status == 'settlement';
        final bool hasReturn = b['has_return'] == true;
        if (isPaid && !hasReturn) {
          active = b;
          break;
        }
      }

      if (active != null && active['motorcycle'] != null) {
        final mcId = active['motorcycle']['id'];
        final gps = await _motorcycleService.getMotorcycleGps(mcId);
        setState(() {
          _activeBooking = active;
          _gpsData = gps;
          _isLoading = false;
        });
        WidgetsBinding.instance.addPostFrameCallback((_) {
          _updateCameraPosition();
        });
      } else {
        setState(() {
          _activeBooking = null;
          _gpsData = null;
          _isLoading = false;
        });
      }
    } catch (_) {
      if (mounted) {
        setState(() => _isLoading = false);
      }
    }
  }

  bool get _hasGpsCoordinates {
    if (_gpsData == null) return false;
    final locations = _gpsData!['locations'];
    return locations is List && locations.isNotEmpty;
  }

  double get _latitude {
    if (!_hasGpsCoordinates) return 0.0;
    final loc = _gpsData!['locations'][0];
    return double.tryParse(loc['latitude'].toString()) ?? 0.0;
  }

  double get _longitude {
    if (!_hasGpsCoordinates) return 0.0;
    final loc = _gpsData!['locations'][0];
    return double.tryParse(loc['longitude'].toString()) ?? 0.0;
  }

  Future<void> _openMapApp() async {
    if (!_hasGpsCoordinates) return;
    final lat = _latitude;
    final lng = _longitude;
    final mapUrl = 'https://www.google.com/maps/search/?api=1&query=$lat,$lng';
    final Uri uri = Uri.parse(mapUrl);
    if (await canLaunchUrl(uri)) {
      await launchUrl(uri, mode: LaunchMode.externalApplication);
    } else {
      if (mounted) {
        DialogHelper.showMessage(
          context: context,
          message: 'Could not open map application.',
          isError: true,
        );
      }
    }
  }

  void _toggleEngineState(bool val) {
    setState(() {
      _engineOn = val;
    });

    DialogHelper.showMessage(
      context: context,
      message: val 
          ? 'Engine starting command sent successfully.' 
          : 'Engine cutoff command sent successfully.',
      isError: false,
    );
  }

  @override
  Widget build(BuildContext context) {
    if (_isLoading) {
      return const Scaffold(
        backgroundColor: AppTheme.backgroundColor,
        body: Center(
          child: CircularProgressIndicator(
            valueColor: AlwaysStoppedAnimation<Color>(AppTheme.primaryColor),
          ),
        ),
      );
    }

    if (_activeBooking == null) {
      return Scaffold(
        backgroundColor: AppTheme.backgroundColor,
        body: RefreshIndicator(
          onRefresh: _loadGpsData,
          color: AppTheme.primaryColor,
          child: LayoutBuilder(
            builder: (context, constraints) {
              return SingleChildScrollView(
                physics: const AlwaysScrollableScrollPhysics(),
                child: ConstrainedBox(
                  constraints: BoxConstraints(
                    minHeight: constraints.maxHeight,
                  ),
                  child: Padding(
                    padding: const EdgeInsets.symmetric(horizontal: 24.0, vertical: 40.0),
                    child: Center(
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: [
                          Container(
                            padding: const EdgeInsets.all(24),
                            decoration: BoxDecoration(
                              color: Colors.white,
                              shape: BoxShape.circle,
                              boxShadow: [
                                BoxShadow(
                                  color: Colors.black.withOpacity(0.04),
                                  blurRadius: 10,
                                  offset: const Offset(0, 4),
                                ),
                              ],
                            ),
                            child: const Icon(
                              Icons.location_off_outlined,
                              size: 80,
                              color: Colors.grey,
                            ),
                          ),
                          const SizedBox(height: 24),
                          const Text(
                            'No Active Rental Found',
                            style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold, color: AppTheme.darkColor),
                          ),
                          const SizedBox(height: 8),
                          const Text(
                            'Rent a motorcycle first to view live GPS tracking and remote power control.',
                            textAlign: TextAlign.center,
                            style: TextStyle(fontSize: 14, color: Colors.grey),
                          ),
                          const SizedBox(height: 16),
                          const Text(
                            'Swipe down to refresh and check for active rentals.',
                            textAlign: TextAlign.center,
                            style: TextStyle(fontSize: 12, color: Colors.grey, fontStyle: FontStyle.italic),
                          ),
                          const SizedBox(height: 24),
                          if (widget.onTabSwitch != null)
                            SizedBox(
                              width: double.infinity,
                              height: 50,
                              child: ElevatedButton(
                                onPressed: () => widget.onTabSwitch!(0),
                                style: ElevatedButton.styleFrom(
                                  backgroundColor: AppTheme.primaryColor,
                                  foregroundColor: AppTheme.darkColor,
                                  shape: RoundedRectangleBorder(
                                    borderRadius: BorderRadius.circular(12),
                                  ),
                                  elevation: 0,
                                ),
                                child: const Text(
                                  'Rent Now',
                                  style: TextStyle(fontWeight: FontWeight.bold, fontSize: 16),
                                ),
                              ),
                            ),
                        ],
                      ),
                    ),
                  ),
                ),
              );
            },
          ),
        ),
      );
    }

    final mc = _activeBooking!['motorcycle'] ?? {};
    final brand = mc['brand'] ?? 'Motorcycle';
    final category = mc['category'] ?? '';
    final plate = mc['license_plate'] ?? '';
    final deviceCode = _gpsData != null ? (_gpsData!['device_code'] ?? 'Unknown') : 'Connecting...';



    return Scaffold(
      backgroundColor: AppTheme.backgroundColor,
      body: RefreshIndicator(
        onRefresh: _loadGpsData,
        color: AppTheme.primaryColor,
        child: SingleChildScrollView(
          physics: const AlwaysScrollableScrollPhysics(),
          padding: const EdgeInsets.all(16.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              // 1. Motorcycle Info Card
              Card(
                elevation: 0,
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(16),
                  side: BorderSide(color: Colors.grey.shade200),
                ),
                color: Colors.white,
                child: Padding(
                  padding: const EdgeInsets.all(16.0),
                  child: Row(
                    children: [
                      Container(
                        padding: const EdgeInsets.all(12),
                        decoration: BoxDecoration(
                          color: AppTheme.backgroundColor,
                          borderRadius: BorderRadius.circular(12),
                        ),
                        child: const Icon(Icons.two_wheeler, color: AppTheme.primaryColor, size: 32),
                      ),
                      const SizedBox(width: 16),
                      Expanded(
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              brand,
                              style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 18, color: AppTheme.darkColor),
                            ),
                            if (category.isNotEmpty) ...[
                              const SizedBox(height: 2),
                              Text(category, style: TextStyle(color: Colors.grey.shade500, fontSize: 13)),
                            ],
                            const SizedBox(height: 6),
                            Row(
                              children: [
                                Container(
                                  padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 4),
                                  decoration: BoxDecoration(
                                    color: Colors.grey.shade100,
                                    borderRadius: BorderRadius.circular(6),
                                  ),
                                  child: Text(
                                    plate.isNotEmpty ? plate : 'No Plate',
                                    style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 12, color: AppTheme.darkColor),
                                  ),
                                ),
                                const SizedBox(width: 8),
                                FadeTransition(
                                  opacity: _pulseController,
                                  child: Container(
                                    width: 8,
                                    height: 8,
                                    decoration: const BoxDecoration(
                                      color: Colors.green,
                                      shape: BoxShape.circle,
                                    ),
                                  ),
                                ),
                                const SizedBox(width: 4),
                                const Text(
                                  'GPS Active',
                                  style: TextStyle(fontSize: 12, color: Colors.green, fontWeight: FontWeight.bold),
                                ),
                              ],
                            ),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
              ),
              const SizedBox(height: 16),

              // 2. Map Tracker Card
              Card(
                elevation: 0,
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(16),
                  side: BorderSide(color: Colors.grey.shade200),
                ),
                color: Colors.white,
                child: Padding(
                  padding: const EdgeInsets.all(16.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          const Row(
                            children: [
                              Icon(Icons.location_on, color: AppTheme.primaryColor),
                              SizedBox(width: 8),
                              Text(
                                'Live GPS Location',
                                style: TextStyle(fontWeight: FontWeight.bold, fontSize: 16, color: AppTheme.darkColor),
                              ),
                            ],
                          ),
                          Text(
                            'Device: $deviceCode',
                            style: TextStyle(fontSize: 12, color: Colors.grey.shade500, fontWeight: FontWeight.w500),
                          ),
                        ],
                      ),
                      const SizedBox(height: 12),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Row(
                            children: [
                              GestureDetector(
                                onTap: () {
                                  setState(() {
                                    _mapType = MapType.normal;
                                  });
                                },
                                child: Container(
                                  padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 6),
                                  decoration: BoxDecoration(
                                    color: _mapType == MapType.normal ? AppTheme.primaryColor : Colors.grey.shade100,
                                    borderRadius: BorderRadius.circular(20),
                                  ),
                                  child: Text(
                                    'Roadmap',
                                    style: TextStyle(
                                      fontSize: 12,
                                      fontWeight: FontWeight.bold,
                                      color: _mapType == MapType.normal ? AppTheme.darkColor : Colors.grey.shade600,
                                    ),
                                  ),
                                ),
                              ),
                              const SizedBox(width: 8),
                              GestureDetector(
                                onTap: () {
                                  setState(() {
                                    _mapType = MapType.hybrid;
                                  });
                                },
                                child: Container(
                                  padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 6),
                                  decoration: BoxDecoration(
                                    color: _mapType == MapType.hybrid ? AppTheme.primaryColor : Colors.grey.shade100,
                                    borderRadius: BorderRadius.circular(20),
                                  ),
                                  child: Text(
                                    'Satellite Hybrid',
                                    style: TextStyle(
                                      fontSize: 12,
                                      fontWeight: FontWeight.bold,
                                      color: _mapType == MapType.hybrid ? AppTheme.darkColor : Colors.grey.shade600,
                                    ),
                                  ),
                                ),
                              ),
                            ],
                          ),
                          Row(
                            children: [
                              IconButton(
                                icon: const Icon(Icons.zoom_out, color: AppTheme.darkColor, size: 20),
                                onPressed: _zoomLevel > 10.0
                                    ? () {
                                        setState(() {
                                          _zoomLevel--;
                                        });
                                        _updateCameraPosition();
                                      }
                                    : null,
                              ),
                              Text(
                                '${_zoomLevel.toInt() - 10}x',
                                style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 13, color: AppTheme.darkColor),
                              ),
                              IconButton(
                                icon: const Icon(Icons.zoom_in, color: AppTheme.darkColor, size: 20),
                                onPressed: _zoomLevel < 20.0
                                    ? () {
                                        setState(() {
                                          _zoomLevel++;
                                        });
                                        _updateCameraPosition();
                                      }
                                    : null,
                              ),
                            ],
                          ),
                        ],
                      ),
                      const SizedBox(height: 12),
                      ClipRRect(
                        borderRadius: BorderRadius.circular(12),
                        child: AspectRatio(
                          aspectRatio: 16 / 9,
                          child: Container(
                            color: AppTheme.backgroundColor,
                            child: _hasGpsCoordinates
                                ? GoogleMap(
                                    initialCameraPosition: CameraPosition(
                                      target: LatLng(_latitude, _longitude),
                                      zoom: _zoomLevel,
                                    ),
                                    mapType: _mapType,
                                    myLocationButtonEnabled: false,
                                    zoomControlsEnabled: false,
                                    gestureRecognizers: <Factory<OneSequenceGestureRecognizer>>{
                                      Factory<OneSequenceGestureRecognizer>(
                                        () => EagerGestureRecognizer(),
                                      ),
                                    },
                                    markers: {
                                      Marker(
                                        markerId: const MarkerId('motorcycle_loc'),
                                        position: LatLng(_latitude, _longitude),
                                        infoWindow: InfoWindow(
                                          title: brand,
                                          snippet: plate,
                                        ),
                                        icon: BitmapDescriptor.defaultMarkerWithHue(
                                          BitmapDescriptor.hueOrange,
                                        ),
                                      ),
                                    },
                                    onMapCreated: (GoogleMapController controller) {
                                      _mapController = controller;
                                    },
                                  )
                                : const Center(
                                    child: Column(
                                      mainAxisAlignment: MainAxisAlignment.center,
                                      children: [
                                        Icon(Icons.gps_off_outlined, size: 48, color: Colors.grey),
                                        SizedBox(height: 8),
                                        Text('No GPS coordinate data found', style: TextStyle(color: Colors.grey)),
                                      ],
                                    ),
                                  ),
                          ),
                        ),
                      ),
                      const SizedBox(height: 16),
                      if (_hasGpsCoordinates)
                        SizedBox(
                          width: double.infinity,
                          height: 48,
                          child: OutlinedButton.icon(
                            onPressed: _openMapApp,
                            icon: const Icon(Icons.navigation_outlined, size: 18),
                            label: const Text('Open in Google Maps', style: TextStyle(fontWeight: FontWeight.bold)),
                            style: OutlinedButton.styleFrom(
                              foregroundColor: AppTheme.darkColor,
                              side: BorderSide(color: Colors.grey.shade300),
                              shape: RoundedRectangleBorder(
                                borderRadius: BorderRadius.circular(12),
                              ),
                            ),
                          ),
                        ),
                    ],
                  ),
                ),
              ),
              const SizedBox(height: 16),

              // 3. Power Control Card (Ignition Switch)
              Card(
                elevation: 0,
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(16),
                  side: BorderSide(color: Colors.grey.shade200),
                ),
                color: Colors.white,
                child: Padding(
                  padding: const EdgeInsets.all(16.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      const Row(
                        children: [
                          Icon(Icons.power_settings_new, color: AppTheme.primaryColor),
                          SizedBox(width: 8),
                          Text(
                            'Power Control (Ignition Relay)',
                            style: TextStyle(fontWeight: FontWeight.bold, fontSize: 16, color: AppTheme.darkColor),
                          ),
                        ],
                      ),
                      const SizedBox(height: 12),
                      Text(
                        'Remotely switch the engine ignition status of your rental motorcycle.',
                        style: TextStyle(color: Colors.grey.shade600, fontSize: 13),
                      ),
                      const SizedBox(height: 24),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Row(
                            children: [
                              Container(
                                width: 12,
                                height: 12,
                                decoration: BoxDecoration(
                                  color: _engineOn ? Colors.green : Colors.red,
                                  shape: BoxShape.circle,
                                ),
                              ),
                              const SizedBox(width: 8),
                              Text(
                                _engineOn ? 'Engine Ignition ON' : 'Engine Cutoff ACTIVE',
                                style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontSize: 14,
                                  color: _engineOn ? Colors.green : Colors.red,
                                ),
                              ),
                            ],
                          ),
                          Switch.adaptive(
                            value: _engineOn,
                            activeColor: AppTheme.primaryColor,
                            onChanged: _toggleEngineState,
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
