import 'package:flutter/material.dart';
import '../../../core/app_theme.dart';
import '../auth/login_screen.dart';
import '../../../REST-API/Models/motorcycle.dart';
import '../../../REST-API/Services/motorcycle_service.dart';
import '../../../REST-API/Services/auth_service.dart';

import 'tabs/motorcycle_tab.dart';
import 'tabs/service_tab.dart';
import 'tabs/gps_tab.dart';
import 'tabs/account_tab.dart';
import 'chatbot_screen.dart';
import '../booking/booking_screen.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  int _currentIndex = 0;
  bool isGuest = true;
  late Future<List<Motorcycle>> futureMotorcycles;
  late PageController _pageController;

  @override
  void initState() {
    super.initState();
    _pageController = PageController(initialPage: _currentIndex);
    _checkAuthStatus();
    futureMotorcycles = MotorcycleService().getMotorcycles();
  }

  @override
  void dispose() {
    _pageController.dispose();
    super.dispose();
  }

  Future<void> _checkAuthStatus() async {
    final authService = AuthService();
    final loggedIn = await authService.isLoggedIn();
    setState(() {
      isGuest = !loggedIn;
    });
  }

  void _showGuestPopup(String actionText, {String? redirectTo}) {
    showDialog(
      context: context,
      builder: (context) {
        return AlertDialog(
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
          title: const Text('Attention', textAlign: TextAlign.center),
          content: Text(
            'You must sign in or register to $actionText.',
            textAlign: TextAlign.center,
          ),
          actionsAlignment: MainAxisAlignment.center,
          actions: [
            OutlinedButton(
              onPressed: () {
                Navigator.pop(context);
                Navigator.push(
                  context,
                  AppTheme.animatedRoute(
                    LoginScreen(
                      redirectTo: redirectTo,
                    ),
                  ),
                ).then((value) {
                  if (value == true) {
                    setState(() {
                      isGuest = false;
                    });
                  }
                });
              },
              child: const Text('Login'),
            ),
            ElevatedButton(
              onPressed: () {
                Navigator.pop(context);
              },
              child: const Text('Cancel'),
            ),
          ],
        );
      },
    );
  }

  void _onMotorTapped(BuildContext context, Motorcycle motor) async {
    if (isGuest) {
      _showGuestPopup('rent a motorcycle', redirectTo: '${motor.brand} ${motor.type}');
    } else {
      await Navigator.push(
        context,
        AppTheme.animatedRoute(BookingScreen(motorcycle: motor)),
      );
      setState(() {
        futureMotorcycles = MotorcycleService().getMotorcycles();
      });
    }
  }

  void _onTabTapped(int index) {
    // If guest clicks Service (1), GPS (2) or Account (3), show popup
    if (isGuest && (index == 1 || index == 2 || index == 3)) {
      String action = 'view this menu';
      if (index == 1) action = 'check service records';
      if (index == 2) action = 'view GPS & Power';
      if (index == 3) action = 'view your Account';
      _showGuestPopup(action);
      return;
    }

    setState(() {
      _currentIndex = index;
    });
    if (_pageController.hasClients) {
      _pageController.animateToPage(
        index,
        duration: const Duration(milliseconds: 300),
        curve: Curves.easeInOutCubic,
      );
    }
  }

  Widget _buildTabItem({
    required int index,
    required IconData icon,
    required String label,
  }) {
    final isSelected = _currentIndex == index;
    return Expanded(
      child: InkWell(
        onTap: () => _onTabTapped(index),
        child: Column(
          mainAxisSize: MainAxisSize.min,
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Icon(
              icon,
              color: isSelected ? AppTheme.primaryColor : Colors.grey.shade500,
              size: 24,
            ),
            const SizedBox(height: 2),
            Text(
              label,
              style: TextStyle(
                color: isSelected ? AppTheme.primaryColor : Colors.grey.shade500,
                fontSize: 10,
                fontWeight: isSelected ? FontWeight.bold : FontWeight.normal,
              ),
            ),
          ],
        ),
      ),
    );
  }

  PreferredSizeWidget? _buildAppBar() {
    if (_currentIndex == 0) {
      return null; // Let MotorcycleTab render its own logo at the top
    }

    String title = '';
    if (_currentIndex == 1) title = 'Service & Maintenance';
    if (_currentIndex == 2) title = 'GPS & Power';
    if (_currentIndex == 3) title = 'My Profile';

    return AppBar(
      automaticallyImplyLeading: false,
      backgroundColor: Colors.white,
      elevation: 0.5,
      title: Text(
        title,
        style: const TextStyle(color: AppTheme.darkColor, fontWeight: FontWeight.bold, fontSize: 18),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: _buildAppBar(),
      body: SafeArea(
        top: true,
        child: PageView(
          controller: _pageController,
          physics: const NeverScrollableScrollPhysics(),
          onPageChanged: (index) {
            setState(() {
              _currentIndex = index;
            });
          },
          children: [
            MotorcycleTab(
              futureMotorcycles: futureMotorcycles,
              onMotorTapped: _onMotorTapped,
              onTabSwitch: _onTabTapped,
            ),
            const ServiceTab(),
            GpsTab(
              isActive: _currentIndex == 2,
              onTabSwitch: _onTabTapped,
            ),
            AccountTab(
              onTabSwitch: _onTabTapped,
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () {
          Navigator.push(
            context,
            AppTheme.animatedRoute(const ChatbotScreen()),
          );
        },
        backgroundColor: AppTheme.primaryColor,
        elevation: 4,
        shape: const CircleBorder(),
        child: const Icon(
          Icons.smart_toy_outlined,
          color: AppTheme.darkColor,
          size: 28,
        ),
      ),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomAppBar(
        shape: const CircularNotchedRectangle(),
        notchMargin: 8.0,
        color: Colors.white,
        elevation: 10,
        child: SizedBox(
          height: 56,
          child: Row(
            children: [
              _buildTabItem(index: 0, icon: Icons.motorcycle, label: 'Motorcycles'),
              _buildTabItem(index: 1, icon: Icons.build_circle_outlined, label: 'Service'),
              const SizedBox(width: 60), // Space for centered FAB
              _buildTabItem(index: 2, icon: Icons.battery_charging_full, label: 'GPS & Power'),
              _buildTabItem(index: 3, icon: Icons.person, label: 'Account'),
            ],
          ),
        ),
      ),
    );
  }
}
