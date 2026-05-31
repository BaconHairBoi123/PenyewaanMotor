import 'package:flutter/material.dart';

class GpsTab extends StatelessWidget {
  const GpsTab({super.key});

  @override
  Widget build(BuildContext context) {
    return const Center(
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Icon(Icons.battery_charging_full, size: 80, color: Colors.green),
          SizedBox(height: 16),
          Text(
            'GPS & Power Information',
            style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
          ),
          SizedBox(height: 8),
          Text(
            'Your active GPS devices and battery power will appear here.',
            textAlign: TextAlign.center,
          ),
        ],
      ),
    );
  }
}
