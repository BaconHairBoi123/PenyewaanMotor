import 'dart:async';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import '../../../../core/app_theme.dart';
import '../../../../REST-API/Models/motorcycle.dart';
import '../../../../REST-API/Services/auth_service.dart';
import '../../../../REST-API/Services/motorcycle_service.dart';
import '../../booking/cart_screen.dart';
import '../../auth/login_screen.dart';

class FilterCriteria {
  String? brand;
  String? type;
  String? transmission;
  String? fuelConfig;
  int? minPrice;
  int? maxPrice;

  bool get isEmpty =>
      brand == null &&
      type == null &&
      transmission == null &&
      fuelConfig == null &&
      minPrice == null &&
      maxPrice == null;
}

class MotorcycleTab extends StatefulWidget {
  final Future<List<Motorcycle>> futureMotorcycles;
  final Function(BuildContext, Motorcycle) onMotorTapped;
  final Function(int)? onTabSwitch;

  const MotorcycleTab({
    super.key,
    required this.futureMotorcycles,
    required this.onMotorTapped,
    this.onTabSwitch,
  });

  @override
  State<MotorcycleTab> createState() => _MotorcycleTabState();
}

class _MotorcycleTabState extends State<MotorcycleTab> {
  late Future<List<Motorcycle>> _future;
  String _selectedCategory = 'All';
  FilterCriteria _filterCriteria = FilterCriteria();
  int _promoIndex = 0;
  String _searchQuery = '';
  late PageController _promoController;
  Timer? _promoTimer;
  static List<Motorcycle>? _cachedMotorcycles;

  @override
  void initState() {
    super.initState();
    _future = widget.futureMotorcycles;
    _promoController = PageController(initialPage: 0);
    _startPromoTimer();
  }

  void _startPromoTimer() {
    _promoTimer?.cancel();
    _promoTimer = Timer.periodic(const Duration(seconds: 4), (timer) {
      if (_promoController.hasClients) {
        int nextPage = _promoIndex + 1;
        if (nextPage >= 2) {
          nextPage = 0;
        }
        _promoController.animateToPage(
          nextPage,
          duration: const Duration(milliseconds: 600),
          curve: Curves.easeInOut,
        );
      }
    });
  }

  @override
  void dispose() {
    _promoTimer?.cancel();
    _promoController.dispose();
    super.dispose();
  }

  @override
  void didUpdateWidget(covariant MotorcycleTab oldWidget) {
    super.didUpdateWidget(oldWidget);
    if (oldWidget.futureMotorcycles != widget.futureMotorcycles) {
      setState(() {
        _future = widget.futureMotorcycles;
      });
    }
  }

  Future<void> _refreshMotorcycles() async {
    final newFuture = MotorcycleService().getMotorcycles();
    setState(() {
      _future = newFuture;
    });
    final data = await newFuture;
    setState(() {
      _cachedMotorcycles = data;
    });
  }

  void _showFilterDrawer(BuildContext context, List<Motorcycle> motors) {
    final brands = motors.map((m) => m.brand).where((b) => b.isNotEmpty).toSet().toList();
    final types = motors.map((m) => m.type).where((t) => t.isNotEmpty).toSet().toList();
    final transmissions = motors.map((m) => m.transmission).where((t) => t.isNotEmpty).toSet().toList();
    final fuelConfigs = motors.map((m) => m.fuelConfiguration).where((f) => f.isNotEmpty).toSet().toList();

    showGeneralDialog(
      context: context,
      barrierDismissible: true,
      barrierLabel: "Filter",
      barrierColor: Colors.black54,
      transitionDuration: const Duration(milliseconds: 300),
      pageBuilder: (context, animation, secondaryAnimation) {
        return Align(
          alignment: Alignment.centerRight,
          child: Material(
            color: Colors.white,
            child: SizedBox(
              width: MediaQuery.of(context).size.width * 0.8,
              height: MediaQuery.of(context).size.height,
              child: FilterDrawer(
                initialCriteria: _filterCriteria,
                brands: brands,
                types: types,
                transmissions: transmissions,
                fuelConfigs: fuelConfigs,
                onApply: (newCriteria) {
                  setState(() {
                    _filterCriteria = newCriteria;
                  });
                  Navigator.of(context).pop();
                },
                onReset: () {
                  setState(() {
                    _filterCriteria = FilterCriteria();
                  });
                  Navigator.of(context).pop();
                },
              ),
            ),
          ),
        );
      },
      transitionBuilder: (context, animation, secondaryAnimation, child) {
        return SlideTransition(
          position: Tween<Offset>(begin: const Offset(1, 0), end: Offset.zero).animate(animation),
          child: child,
        );
      },
    );
  }

  Widget _buildPromoBanners() {
    final List<Widget> promoPages = [
      // Banner 1
      Container(
        margin: const EdgeInsets.symmetric(horizontal: 16),
        decoration: BoxDecoration(
          color: AppTheme.primaryColor.withOpacity(0.15),
          borderRadius: BorderRadius.circular(16),
          image: DecorationImage(
            image: const AssetImage('assets/images/promo_banner_1.png'), // Place your first promo banner here
            fit: BoxFit.cover,
            onError: (err, stack) {},
          ),
        ),
        child: Container(
          decoration: BoxDecoration(
            borderRadius: BorderRadius.circular(16),
            gradient: LinearGradient(
              begin: Alignment.bottomCenter,
              end: Alignment.topCenter,
              colors: [
                Colors.black.withOpacity(0.6),
                Colors.transparent,
              ],
            ),
          ),
          padding: const EdgeInsets.all(16),
          alignment: Alignment.bottomLeft,
          child: const Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisSize: MainAxisSize.min,
            children: [
              Text(
                'CHIPELAGO',
                style: TextStyle(color: Colors.white, fontSize: 20, fontWeight: FontWeight.bold),
              ),
              Text(
                'RIDE FREELY WITH RIDENUSA',
                style: TextStyle(color: AppTheme.primaryColor, fontSize: 13, fontWeight: FontWeight.bold),
              ),
            ],
          ),
        ),
      ),
      // Banner 2
      Container(
        margin: const EdgeInsets.symmetric(horizontal: 16),
        decoration: BoxDecoration(
          color: AppTheme.primaryColor.withOpacity(0.15),
          borderRadius: BorderRadius.circular(16),
          image: DecorationImage(
            image: const AssetImage('assets/images/promo_banner_2.png'), // Place your second promo banner here
            fit: BoxFit.cover,
            onError: (err, stack) {},
          ),
        ),
        child: Container(
          decoration: BoxDecoration(
            borderRadius: BorderRadius.circular(16),
            gradient: LinearGradient(
              begin: Alignment.bottomCenter,
              end: Alignment.topCenter,
              colors: [
                Colors.black.withOpacity(0.6),
                Colors.transparent,
              ],
            ),
          ),
          padding: const EdgeInsets.all(16),
          alignment: Alignment.bottomLeft,
          child: const Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisSize: MainAxisSize.min,
            children: [
              Text(
                'EXPLORE PARADISE',
                style: TextStyle(color: Colors.white, fontSize: 20, fontWeight: FontWeight.bold),
              ),
              Text(
                'Comfortable scooters ready for every journey',
                style: TextStyle(color: Colors.white70, fontSize: 12),
              ),
            ],
          ),
        ),
      ),
    ];

    return Column(
      children: [
        SizedBox(
          height: 180,
          child: PageView.builder(
            controller: _promoController,
            itemCount: promoPages.length,
            onPageChanged: (int index) {
              setState(() {
                _promoIndex = index;
              });
            },
            itemBuilder: (context, index) {
              return promoPages[index];
            },
          ),
        ),
        const SizedBox(height: 12),
        // Dots Indicator
        Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: List.generate(
            promoPages.length,
            (index) => AnimatedContainer(
              duration: const Duration(milliseconds: 200),
              margin: const EdgeInsets.symmetric(horizontal: 4),
              height: 8,
              width: _promoIndex == index ? 32 : 8,
              decoration: BoxDecoration(
                color: _promoIndex == index ? AppTheme.primaryColor : Colors.grey.shade400,
                borderRadius: BorderRadius.circular(4),
              ),
            ),
          ),
        ),
      ],
    );
  }

  @override
  Widget build(BuildContext context) {
    return FutureBuilder<List<Motorcycle>>(
      future: _future,
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          _cachedMotorcycles = snapshot.data;
        }

        if (snapshot.connectionState == ConnectionState.waiting && _cachedMotorcycles == null) {
          return const Center(child: CircularProgressIndicator());
        } else if (snapshot.hasError && _cachedMotorcycles == null) {
          return Center(child: Text('Error: ${snapshot.error}'));
        } else if ((!snapshot.hasData || snapshot.data!.isEmpty) && _cachedMotorcycles == null) {
          return const Center(child: Text('No motorcycles available.'));
        }

        final allMotors = snapshot.data ?? _cachedMotorcycles!;

        final categories = ['All'];
        for (var motor in allMotors) {
          if (motor.category.isNotEmpty && !categories.contains(motor.category)) {
            categories.add(motor.category);
          }
        }

        final filteredMotors = allMotors.where((m) {
          if (_selectedCategory != 'All' && m.category != _selectedCategory) return false;
          if (_filterCriteria.brand != null && m.brand != _filterCriteria.brand) return false;
          if (_filterCriteria.type != null && m.type != _filterCriteria.type) return false;
          if (_filterCriteria.transmission != null && m.transmission != _filterCriteria.transmission) return false;
          if (_filterCriteria.fuelConfig != null && m.fuelConfiguration != _filterCriteria.fuelConfig) return false;
          if (_filterCriteria.minPrice != null && m.price < _filterCriteria.minPrice!) return false;
          if (_filterCriteria.maxPrice != null && m.price > _filterCriteria.maxPrice!) return false;
          
          // Text search query filter
          if (_searchQuery.isNotEmpty &&
              !m.brand.toLowerCase().contains(_searchQuery.toLowerCase()) &&
              !m.type.toLowerCase().contains(_searchQuery.toLowerCase())) {
            return false;
          }
          
          return true;
        }).toList();

        // Pinned Header: Search Bar + Cart Icon (No Logo)
        Widget stickyHeader = Container(
          color: Colors.white,
          padding: const EdgeInsets.only(top: 12.0, bottom: 8.0, left: 16.0, right: 8.0),
          child: Row(
            children: [
              Expanded(
                child: Row(
                  children: [
                    Expanded(
                      child: Container(
                        height: 44,
                        decoration: BoxDecoration(
                          color: Colors.white,
                          borderRadius: const BorderRadius.only(
                            topLeft: Radius.circular(8),
                            bottomLeft: Radius.circular(8),
                          ),
                          border: Border.all(color: Colors.grey.shade300),
                        ),
                        child: TextField(
                          onChanged: (val) {
                            setState(() {
                              _searchQuery = val;
                            });
                          },
                          decoration: InputDecoration(
                            hintText: 'Search',
                            border: InputBorder.none,
                            contentPadding: const EdgeInsets.symmetric(horizontal: 16, vertical: 12),
                            suffixIcon: IconButton(
                              icon: Icon(
                                Icons.tune,
                                size: 20,
                                color: _filterCriteria.isEmpty ? Colors.grey : AppTheme.primaryColor,
                              ),
                              onPressed: () => _showFilterDrawer(context, allMotors),
                            ),
                          ),
                        ),
                      ),
                    ),
                    Container(
                      height: 44,
                      width: 48,
                      decoration: const BoxDecoration(
                        color: AppTheme.primaryColor,
                        borderRadius: BorderRadius.only(
                          topRight: Radius.circular(8),
                          bottomRight: Radius.circular(8),
                        ),
                      ),
                      child: const Icon(Icons.search, color: Colors.white, size: 20),
                    ),
                  ],
                ),
              ),
              const SizedBox(width: 4),
              IconButton(
                icon: const Icon(
                  Icons.shopping_cart_outlined,
                  color: AppTheme.darkColor,
                  size: 32,
                ),
                onPressed: () async {
                  final navigator = Navigator.of(context);
                  final loggedIn = await AuthService().isLoggedIn();
                  if (!context.mounted) return;
                  if (!loggedIn) {
                    showDialog(
                      context: context,
                      builder: (ctx) => AlertDialog(
                        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
                        title: const Row(
                          children: [
                            Icon(Icons.login_outlined, color: AppTheme.primaryColor, size: 28),
                            SizedBox(width: 10),
                            Text(
                              'Login Required',
                              style: TextStyle(
                                fontWeight: FontWeight.bold,
                                fontSize: 18,
                                color: AppTheme.darkColor,
                              ),
                            ),
                          ],
                        ),
                        content: const Text(
                          'Please login first to view your rental cart.',
                          style: TextStyle(color: AppTheme.darkColor, fontSize: 14),
                        ),
                        actions: [
                          TextButton(
                            onPressed: () => Navigator.pop(ctx),
                            child: const Text('Cancel', style: TextStyle(color: Colors.grey)),
                          ),
                          ElevatedButton(
                            onPressed: () {
                              Navigator.pop(ctx);
                              navigator.push(AppTheme.animatedRoute(const LoginScreen()));
                            },
                            style: ElevatedButton.styleFrom(
                              backgroundColor: AppTheme.primaryColor,
                              foregroundColor: AppTheme.darkColor,
                              elevation: 0,
                              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(8)),
                            ),
                            child: const Text('Login / Register', style: TextStyle(fontWeight: FontWeight.bold)),
                          ),
                        ],
                      ),
                    );
                  } else {
                    final result = await navigator.push(
                      AppTheme.animatedRoute(const CartScreen()),
                    );
                    if (mounted) {
                      _refreshMotorcycles();
                    }
                    if (result is int && mounted && widget.onTabSwitch != null) {
                      widget.onTabSwitch!(result);
                    }
                  }
                },
              ),
            ],
          ),
        );

        return Column(
          children: [
            stickyHeader,
            Expanded(
              child: RefreshIndicator(
                onRefresh: _refreshMotorcycles,
                color: AppTheme.primaryColor,
                child: SingleChildScrollView(
                  physics: const AlwaysScrollableScrollPhysics(),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      const SizedBox(height: 4), // Compact spacing between search bar and promo banners
                      _buildPromoBanners(),
                      const SizedBox(height: 24),
                      const Padding(
                        padding: EdgeInsets.symmetric(horizontal: 16.0),
                        child: Text(
                          'Categories',
                          style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
                        ),
                      ),
                      const SizedBox(height: 12),
                      SizedBox(
                        height: 40,
                        child: ListView.builder(
                          scrollDirection: Axis.horizontal,
                          padding: const EdgeInsets.symmetric(horizontal: 16),
                          itemCount: categories.length,
                          itemBuilder: (context, index) {
                            final cat = categories[index];
                            return GestureDetector(
                              onTap: () {
                                setState(() {
                                  _selectedCategory = cat;
                                });
                              },
                              child: CategoryChip(
                                label: cat,
                                isActive: _selectedCategory == cat,
                              ),
                            );
                          },
                        ),
                      ),
                      const SizedBox(height: 24),
                      const Padding(
                        padding: EdgeInsets.symmetric(horizontal: 16.0),
                        child: Text(
                          'Available Motorcycles',
                          style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
                        ),
                      ),
                      if (filteredMotors.isEmpty)
                        const Padding(
                          padding: EdgeInsets.all(32.0),
                          child: Center(child: Text('No motorcycles match your filter.')),
                        ),
                      ListView.builder(
                        shrinkWrap: true,
                        physics: const NeverScrollableScrollPhysics(),
                        itemCount: filteredMotors.length,
                        itemBuilder: (context, index) {
                          final motor = filteredMotors[index];
                          return TweenAnimationBuilder<double>(
                            duration: Duration(milliseconds: 300 + (index * 80).clamp(0, 400)),
                            tween: Tween<double>(begin: 0.0, end: 1.0),
                            curve: Curves.easeOutCubic,
                            builder: (context, value, child) {
                              return Opacity(
                                opacity: value,
                                child: Transform.translate(
                                  offset: Offset(0.0, 30.0 * (1.0 - value)),
                                  child: child,
                                ),
                              );
                            },
                            child: MotorCard(
                              motor: motor,
                              onTap: () => widget.onMotorTapped(context, motor),
                            ),
                          );
                        },
                      ),
                    ],
                  ),
                ),
              ),
            ),
          ],
        );
      },
    );
  }
}

class CategoryChip extends StatelessWidget {
  final String label;
  final bool isActive;
  const CategoryChip({super.key, required this.label, this.isActive = false});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.only(right: 8),
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
      decoration: BoxDecoration(
        color: isActive ? AppTheme.primaryColor : Colors.white,
        borderRadius: BorderRadius.circular(20),
        border: Border.all(
          color: isActive ? AppTheme.primaryColor : Colors.grey.shade300,
        ),
      ),
      child: Text(
        label,
        style: TextStyle(
          color: isActive ? AppTheme.darkColor : Colors.black87,
          fontWeight: isActive ? FontWeight.bold : FontWeight.normal,
        ),
      ),
    );
  }
}

class MotorCard extends StatelessWidget {
  final Motorcycle motor;
  final VoidCallback onTap;

  const MotorCard({super.key, required this.motor, required this.onTap});

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: onTap,
      child: Card(
        margin: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
        elevation: 2,
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Container(
              height: 160,
              width: double.infinity,
              decoration: BoxDecoration(
                color: Colors.grey.shade200,
                borderRadius: const BorderRadius.vertical(top: Radius.circular(12)),
              ),
              child: ClipRRect(
                borderRadius: const BorderRadius.vertical(top: Radius.circular(12)),
                child: motor.imageUrl != null
                    ? Image.network(
                        motor.imageUrl!,
                        fit: BoxFit.cover,
                        loadingBuilder: (context, child, loadingProgress) {
                          if (loadingProgress == null) return child;
                          return Center(
                            child: CircularProgressIndicator(
                              value: loadingProgress.expectedTotalBytes != null
                                  ? loadingProgress.cumulativeBytesLoaded / loadingProgress.expectedTotalBytes!
                                  : null,
                              strokeWidth: 2,
                              color: Colors.amber,
                            ),
                          );
                        },
                        errorBuilder: (context, error, stackTrace) {
                          return const Center(child: Icon(Icons.two_wheeler, size: 60, color: Colors.grey));
                        },
                      )
                    : const Center(child: Icon(Icons.two_wheeler, size: 60, color: Colors.grey)),
              ),
            ),
            Padding(
              padding: const EdgeInsets.all(12.0),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    motor.category, // Nama motornya di motor yg ada
                    style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                  ),
                  const SizedBox(height: 2),
                  Text(
                    motor.brand, // Brandnya dibawah nama motornya
                    style: TextStyle(fontSize: 14, color: Colors.grey.shade700, fontWeight: FontWeight.w500),
                  ),
                  const SizedBox(height: 6),
                  Text(
                    '${motor.type} • ${motor.transmission} • ${motor.cc}cc',
                    style: TextStyle(fontSize: 12, color: Colors.grey.shade600),
                  ),
                  const SizedBox(height: 12),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Text(
                        'Rp ${NumberFormat.decimalPattern('id').format(motor.price)}/day',
                        style: const TextStyle(
                          color: AppTheme.primaryColor,
                          fontWeight: FontWeight.bold,
                          fontSize: 16,
                        ),
                      ),
                      ElevatedButton(
                        onPressed: onTap,
                        style: ElevatedButton.styleFrom(
                          backgroundColor: AppTheme.primaryColor,
                          foregroundColor: Colors.white,
                          padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 8),
                          shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(8),
                          ),
                        ),
                        child: const Text('Rent'),
                      ),
                    ],
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}

class FilterDrawer extends StatefulWidget {
  final FilterCriteria initialCriteria;
  final List<String> brands;
  final List<String> types;
  final List<String> transmissions;
  final List<String> fuelConfigs;
  final Function(FilterCriteria) onApply;
  final VoidCallback onReset;

  const FilterDrawer({
    super.key,
    required this.initialCriteria,
    required this.brands,
    required this.types,
    required this.transmissions,
    required this.fuelConfigs,
    required this.onApply,
    required this.onReset,
  });

  @override
  State<FilterDrawer> createState() => _FilterDrawerState();
}

class _FilterDrawerState extends State<FilterDrawer> {
  late FilterCriteria _criteria;
  final TextEditingController _minPriceCtrl = TextEditingController();
  final TextEditingController _maxPriceCtrl = TextEditingController();

  @override
  void initState() {
    super.initState();
    _criteria = FilterCriteria()
      ..brand = widget.initialCriteria.brand
      ..type = widget.initialCriteria.type
      ..transmission = widget.initialCriteria.transmission
      ..fuelConfig = widget.initialCriteria.fuelConfig
      ..minPrice = widget.initialCriteria.minPrice
      ..maxPrice = widget.initialCriteria.maxPrice;
    
    if (_criteria.minPrice != null) _minPriceCtrl.text = _criteria.minPrice.toString();
    if (_criteria.maxPrice != null) _maxPriceCtrl.text = _criteria.maxPrice.toString();
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Column(
        children: [
          Container(
            padding: const EdgeInsets.all(16),
            color: Colors.grey.shade50,
            width: double.infinity,
            child: const Text('Search Filter', style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold)),
          ),
          Expanded(
            child: ListView(
              padding: const EdgeInsets.all(16),
              children: [
                _buildFilterSection('Brand', widget.brands, _criteria.brand, (val) {
                  setState(() => _criteria.brand = _criteria.brand == val ? null : val);
                }),
                _buildFilterSection('Type', widget.types, _criteria.type, (val) {
                  setState(() => _criteria.type = _criteria.type == val ? null : val);
                }),
                _buildFilterSection('Transmission', widget.transmissions, _criteria.transmission, (val) {
                  setState(() => _criteria.transmission = _criteria.transmission == val ? null : val);
                }),
                _buildFilterSection('Fuel Configuration', widget.fuelConfigs, _criteria.fuelConfig, (val) {
                  setState(() => _criteria.fuelConfig = _criteria.fuelConfig == val ? null : val);
                }),
                const Text('Price', style: TextStyle(fontSize: 14, fontWeight: FontWeight.w500, color: Colors.black87)),
                const SizedBox(height: 8),
                Row(
                  children: [
                    Expanded(
                      child: TextField(
                        controller: _minPriceCtrl,
                        keyboardType: TextInputType.number,
                        decoration: InputDecoration(
                          hintText: 'MIN',
                          hintStyle: const TextStyle(fontSize: 12),
                          contentPadding: const EdgeInsets.symmetric(horizontal: 12, vertical: 8),
                          border: OutlineInputBorder(borderRadius: BorderRadius.circular(8)),
                        ),
                        onChanged: (val) => _criteria.minPrice = int.tryParse(val),
                      ),
                    ),
                    const Padding(
                      padding: EdgeInsets.symmetric(horizontal: 8.0),
                      child: Text('—', style: TextStyle(color: Colors.grey)),
                    ),
                    Expanded(
                      child: TextField(
                        controller: _maxPriceCtrl,
                        keyboardType: TextInputType.number,
                        decoration: InputDecoration(
                          hintText: 'MAX',
                          hintStyle: const TextStyle(fontSize: 12),
                          contentPadding: const EdgeInsets.symmetric(horizontal: 12, vertical: 8),
                          border: OutlineInputBorder(borderRadius: BorderRadius.circular(8)),
                        ),
                        onChanged: (val) => _criteria.maxPrice = int.tryParse(val),
                      ),
                    ),
                  ],
                ),
                const SizedBox(height: 24),
              ],
            ),
          ),
          Container(
            padding: const EdgeInsets.all(16),
            decoration: BoxDecoration(
              color: Colors.white,
              boxShadow: [
                BoxShadow(color: Colors.black12, blurRadius: 4, offset: const Offset(0, -2))
              ],
            ),
            child: Row(
              children: [
                Expanded(
                  child: OutlinedButton(
                    onPressed: widget.onReset,
                    style: OutlinedButton.styleFrom(
                      foregroundColor: AppTheme.primaryColor,
                      side: const BorderSide(color: AppTheme.primaryColor),
                      padding: const EdgeInsets.symmetric(vertical: 14),
                    ),
                    child: const Text('Reset'),
                  ),
                ),
                const SizedBox(width: 12),
                Expanded(
                  child: ElevatedButton(
                    onPressed: () => widget.onApply(_criteria),
                    style: ElevatedButton.styleFrom(
                      backgroundColor: AppTheme.primaryColor,
                      foregroundColor: Colors.white,
                      padding: const EdgeInsets.symmetric(vertical: 14),
                    ),
                    child: const Text('Apply'),
                  ),
                ),
              ],
            ),
          )
        ],
      ),
    );
  }

  Widget _buildFilterSection(String title, List<String> options, String? selectedValue, Function(String) onSelect) {
    if (options.isEmpty) return const SizedBox.shrink();
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Text(title, style: const TextStyle(fontSize: 14, fontWeight: FontWeight.w500, color: Colors.black87)),
        const SizedBox(height: 8),
        Wrap(
          spacing: 8,
          runSpacing: 8,
          children: options.map((opt) {
            final isSelected = opt == selectedValue;
            return GestureDetector(
              onTap: () => onSelect(opt),
              child: Container(
                width: (MediaQuery.of(context).size.width * 0.8 - 40) / 2, // 2 columns roughly
                padding: const EdgeInsets.symmetric(vertical: 10),
                decoration: BoxDecoration(
                  color: isSelected ? AppTheme.primaryColor.withValues(alpha: 0.1) : Colors.grey.shade100,
                  border: Border.all(color: isSelected ? AppTheme.primaryColor : Colors.transparent),
                  borderRadius: BorderRadius.circular(6),
                ),
                child: Center(
                  child: Text(
                    opt,
                    style: TextStyle(
                      fontSize: 12,
                      color: isSelected ? AppTheme.primaryColor : Colors.black87,
                      fontWeight: isSelected ? FontWeight.bold : FontWeight.normal,
                    ),
                    textAlign: TextAlign.center,
                  ),
                ),
              ),
            );
          }).toList(),
        ),
        const SizedBox(height: 16),
      ],
    );
  }
}
