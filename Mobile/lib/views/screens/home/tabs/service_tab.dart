import 'package:flutter/material.dart';
import '../../../../core/app_theme.dart';
import '../../../../REST-API/Services/motorcycle_service.dart';

class ServiceTab extends StatefulWidget {
  const ServiceTab({super.key});

  @override
  State<ServiceTab> createState() => _ServiceTabState();
}

class _ServiceTabState extends State<ServiceTab> {
  final TextEditingController _searchController = TextEditingController();
  final MotorcycleService _service = MotorcycleService();
  List<dynamic> _motorcycles = [];
  bool _isLoading = false;
  String _errorMessage = '';

  @override
  void initState() {
    super.initState();
    _fetchServices();
  }

  Future<void> _fetchServices({String? query}) async {
    setState(() {
      _isLoading = true;
      _errorMessage = '';
    });

    try {
      final data = await _service.getMotorcycleServices(licensePlate: query);
      setState(() {
        _motorcycles = data;
        _isLoading = false;
      });
    } catch (e) {
      setState(() {
        _errorMessage = 'Failed to load service records: $e';
        _isLoading = false;
      });
    }
  }

  @override
  void dispose() {
    _searchController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        // Search Section
        Padding(
          padding: const EdgeInsets.all(16.0),
          child: Container(
            decoration: BoxDecoration(
              color: Colors.white,
              borderRadius: BorderRadius.circular(12),
              boxShadow: [
                BoxShadow(
                  color: Colors.black.withOpacity(0.05),
                  blurRadius: 10,
                  offset: const Offset(0, 4),
                )
              ],
            ),
            child: TextField(
              controller: _searchController,
              onChanged: (val) {
                _fetchServices(query: val);
              },
              decoration: InputDecoration(
                hintText: 'Search vehicle plate (e.g. DK 1234 XX)...',
                prefixIcon: const Icon(Icons.search, color: Colors.grey),
                suffixIcon: _searchController.text.isNotEmpty
                    ? IconButton(
                        icon: const Icon(Icons.clear, color: Colors.grey),
                        onPressed: () {
                          _searchController.clear();
                          _fetchServices();
                        },
                      )
                    : null,
                border: InputBorder.none,
                contentPadding: const EdgeInsets.symmetric(vertical: 14, horizontal: 16),
              ),
            ),
          ),
        ),

        // Result Section
        Expanded(
          child: LayoutBuilder(
            builder: (context, constraints) {
              return RefreshIndicator(
                onRefresh: () => _fetchServices(query: _searchController.text),
                color: AppTheme.primaryColor,
                child: _isLoading
                    ? const Center(child: CircularProgressIndicator())
                    : _errorMessage.isNotEmpty
                        ? SingleChildScrollView(
                            physics: const AlwaysScrollableScrollPhysics(),
                            child: Container(
                              height: constraints.maxHeight,
                              alignment: Alignment.center,
                              child: Text(_errorMessage, style: const TextStyle(color: Colors.redAccent)),
                            ),
                          )
                        : _motorcycles.isEmpty
                            ? SingleChildScrollView(
                                physics: const AlwaysScrollableScrollPhysics(),
                                child: Container(
                                  height: constraints.maxHeight,
                                  alignment: Alignment.center,
                                  child: const Column(
                                    mainAxisAlignment: MainAxisAlignment.center,
                                    children: [
                                      Icon(Icons.build_circle_outlined, size: 64, color: Colors.grey),
                                      SizedBox(height: 16),
                                      Text(
                                        'No vehicle records found.',
                                        style: TextStyle(color: Colors.grey, fontSize: 16),
                                      ),
                                    ],
                                  ),
                                ),
                              )
                            : ListView.builder(
                                physics: const AlwaysScrollableScrollPhysics(),
                                padding: const EdgeInsets.symmetric(horizontal: 16),
                          itemCount: _motorcycles.length,
                          itemBuilder: (context, index) {
                            final motor = _motorcycles[index];
                            final List<dynamic> services = motor['services'] ?? [];
                            final String lastService = motor['last_service_date'] ?? '-';
                            final String brand = motor['brand'] ?? '';
                            final String category = motor['category'] ?? '';
                            final String plate = motor['license_plate'] ?? 'No Plate';

                            return Container(
                              margin: const EdgeInsets.only(bottom: 16),
                              decoration: BoxDecoration(
                                color: Colors.white,
                                borderRadius: BorderRadius.circular(16),
                                border: Border.all(color: Colors.grey.shade100),
                                boxShadow: [
                                  BoxShadow(
                                    color: Colors.black.withOpacity(0.02),
                                    blurRadius: 10,
                                    offset: const Offset(0, 4),
                                  )
                                ],
                              ),
                              child: ExpansionTile(
                                leading: Container(
                                  padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 6),
                                  decoration: BoxDecoration(
                                    color: Colors.black87,
                                    borderRadius: BorderRadius.circular(6),
                                    border: Border.all(color: Colors.white, width: 1),
                                  ),
                                  child: Text(
                                    plate.toUpperCase(),
                                    style: const TextStyle(
                                      color: Colors.white,
                                      fontSize: 12,
                                      fontWeight: FontWeight.bold,
                                      letterSpacing: 1,
                                    ),
                                  ),
                                ),
                                title: Text(
                                  '$brand $category',
                                  style: const TextStyle(
                                    fontWeight: FontWeight.bold,
                                    color: AppTheme.darkColor,
                                  ),
                                ),
                                subtitle: Text(
                                  'Last Service: $lastService',
                                  style: TextStyle(
                                    color: Colors.grey.shade600,
                                    fontSize: 12,
                                  ),
                                ),
                                children: [
                                  const Divider(height: 1),
                                  if (services.isEmpty)
                                    const Padding(
                                      padding: EdgeInsets.all(16.0),
                                      child: Text(
                                        'No recent service history details available.',
                                        style: TextStyle(color: Colors.grey, fontSize: 13),
                                      ),
                                    )
                                  else
                                    ListView.builder(
                                      shrinkWrap: true,
                                      physics: const NeverScrollableScrollPhysics(),
                                      itemCount: services.length,
                                      itemBuilder: (context, sIdx) {
                                        final item = services[sIdx];
                                        final date = item['service_date'] ?? '-';
                                        final km = item['kilometer'] ?? '0';

                                        return ListTile(
                                          dense: true,
                                          leading: const Icon(Icons.check_circle_outline, color: Colors.green),
                                          title: Text(
                                            'Routine Maintenance Service',
                                            style: TextStyle(fontWeight: FontWeight.w600, color: Colors.grey.shade800),
                                          ),
                                          subtitle: Text('Date: $date'),
                                          trailing: Text(
                                            '$km Km',
                                            style: const TextStyle(fontWeight: FontWeight.bold),
                                          ),
                                        );
                                      },
                                    ),
                                ],
                              ),
                            );
                          },
                        ),
              );
            },
          ),
        ),
      ],
    );
  }
}
