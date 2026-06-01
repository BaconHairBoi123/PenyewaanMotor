import 'dart:async';
import 'package:flutter/material.dart';
import '../../core/app_theme.dart';
import '../../REST-API/Services/auth_service.dart';

class SplashScreen extends StatefulWidget {
  const SplashScreen({super.key});

  @override
  State<SplashScreen> createState() => _SplashScreenState();
}

class _SplashScreenState extends State<SplashScreen> {
  @override
  void initState() {
    super.initState();
    _checkStatusAndNavigate();
  }

  void _checkStatusAndNavigate() async {
    final isLoggedIn = await AuthService().isLoggedIn();
    Timer(const Duration(seconds: 3), () {
      if (mounted) {
        if (isLoggedIn) {
          Navigator.of(context).pushReplacementNamed('/home');
        } else {
          Navigator.of(context).pushReplacementNamed('/login');
        }
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: AppTheme.primaryColor,
      body: Center(
        child: Padding(
          padding: const EdgeInsets.symmetric(horizontal: 40.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              // ==========================================
              // TODO: REPLACE SPLASH SCREEN LOGO IMAGE HERE
              // Swap the asset path below with your own logo image asset.
              // Example: Image.asset('assets/images/your_new_logo.png')
              // ==========================================
              Image.asset(
                'assets/images/logo_ridenusa_white.png',
                fit: BoxFit.contain,
              ),
            ],
          ),
        ),
      ),
    );
  }
}
