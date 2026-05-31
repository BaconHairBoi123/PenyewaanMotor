import 'package:flutter/material.dart';
import '../../../core/app_theme.dart';
import '../auth/login_screen.dart';
import '../../../REST-API/Models/motorcycle.dart';
import '../../../REST-API/Services/motorcycle_service.dart';
import '../../../REST-API/Services/auth_service.dart';

import 'tabs/home_tab.dart';
import 'tabs/motorcycle_tab.dart';
import 'tabs/account_tab.dart';
import 'tabs/gps_tab.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  int _currentIndex = 0;
  bool isGuest = true;
  late Future<List<Motorcycle>> futureMotorcycles;

  @override
  void initState() {
    super.initState();
    _checkAuthStatus();
    futureMotorcycles = MotorcycleService().getMotorcycles();
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
                  MaterialPageRoute(
                    builder: (context) => LoginScreen(
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
              child: const Text('Register'),
            ),
          ],
        );
      },
    );
  }

  void _onMotorTapped(BuildContext context, Motorcycle motor) {
    if (isGuest) {
      _showGuestPopup('rent a motorcycle', redirectTo: '${motor.brand} ${motor.type}');
    } else {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Navigating to detail: ${motor.brand} ${motor.type}')),
      );
    }
  }

  void _onTabTapped(int index) {
    // If guest clicks GPS (2) or Account (3), show popup
    if (isGuest && (index == 2 || index == 3)) {
      String action = index == 2 ? 'view GPS & Power' : 'view your Account';
      _showGuestPopup(action);
      return;
    }

    setState(() {
      _currentIndex = index;
    });
  }

  @override
  Widget build(BuildContext context) {
    // Determine title based on tab
    String appBarTitle = 'RideNusa';
    if (_currentIndex == 1) appBarTitle = 'Motorcycles';
    if (_currentIndex == 2) appBarTitle = 'GPS & Power';
    if (_currentIndex == 3) appBarTitle = 'Account';

    return Scaffold(
      appBar: AppBar(
        backgroundColor: AppTheme.surfaceColor,
        elevation: 0,
        title: Text(
          appBarTitle,
          style: const TextStyle(color: Colors.black87, fontWeight: FontWeight.bold),
        ),
        actions: [
          IconButton(
            onPressed: () {},
            icon: const Icon(Icons.shopping_cart_outlined, color: Colors.black87),
          ),
        ],
      ),
      body: IndexedStack(
        index: _currentIndex,
        children: [
          HomeTab(isGuest: isGuest),
          MotorcycleTab(
            futureMotorcycles: futureMotorcycles,
            onMotorTapped: _onMotorTapped,
          ),
          const GpsTab(),
          const AccountTab(),
        ],
      ),
      bottomNavigationBar: BottomNavigationBar(
        selectedItemColor: AppTheme.primaryColor,
        unselectedItemColor: Colors.grey,
        currentIndex: _currentIndex,
        onTap: _onTabTapped,
        type: BottomNavigationBarType.fixed,
        items: const [
          BottomNavigationBarItem(icon: Icon(Icons.home), label: 'Home'),
          BottomNavigationBarItem(icon: Icon(Icons.motorcycle), label: 'Motorcycles'),
          BottomNavigationBarItem(icon: Icon(Icons.battery_charging_full), label: 'GPS & Power'),
          BottomNavigationBarItem(icon: Icon(Icons.person), label: 'Account'),
        ],
      ),
    );
  }
}
