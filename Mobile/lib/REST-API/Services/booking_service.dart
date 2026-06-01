import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import '../api_config.dart';
import '../Models/accessory.dart';

class BookingService {
  // Fetch available accessories
  Future<List<Accessory>> getAccessories() async {
    try {
      final response = await http.get(
        Uri.parse('${ApiConfig.baseUrl}/accessories'),
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
      );

      if (response.statusCode == 200) {
        final Map<String, dynamic> responseData = json.decode(response.body);
        if (responseData['status'] == 'success' && responseData['data'] != null) {
          final List<dynamic> list = responseData['data'];
          return list.map((item) => Accessory.fromJson(item)).toList();
        }
      }
      return [];
    } catch (_) {
      return [];
    }
  }

  // Create a new booking
  Future<Map<String, dynamic>> createBooking({
    required int motorcycleId,
    required String startDate,
    required String endDate,
    required String deliveryType,
    double? distanceKm,
    double? latitude,
    double? longitude,
    String? deliveryAddress,
    List<int>? accessories,
  }) async {
    try {
      final prefs = await SharedPreferences.getInstance();
      final token = prefs.getString('auth_token');
      if (token == null) {
        return {'success': false, 'message': 'You must be logged in to book.'};
      }

      final Map<String, dynamic> body = {
        'motorcycle_id': motorcycleId,
        'start_date': startDate,
        'end_date': endDate,
        'delivery_type': deliveryType,
      };

      if (deliveryType == 'delivery') {
        body['distance_km'] = distanceKm;
        body['latitude'] = latitude;
        body['longitude'] = longitude;
        body['delivery_address'] = deliveryAddress;
      }

      if (accessories != null && accessories.isNotEmpty) {
        body['accessories'] = accessories;
      }

      final response = await http.post(
        Uri.parse('${ApiConfig.baseUrl}/bookings'),
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'Authorization': 'Bearer $token',
        },
        body: json.encode(body),
      );

      final Map<String, dynamic> responseData = json.decode(response.body);
      if (response.statusCode == 201 && responseData['status'] == 'success') {
        return {
          'success': true,
          'message': responseData['message'] ?? 'Booking successful',
          'data': responseData['data'],
        };
      } else {
        return {
          'success': false,
          'message': responseData['message'] ?? 'Failed to complete booking.',
        };
      }
    } catch (e) {
      return {
        'success': false,
        'message': 'Connection error occurred. Please check your internet.',
      };
    }
  }

  // Fetch user booking history
  Future<List<Map<String, dynamic>>> getBookingHistory() async {
    try {
      final prefs = await SharedPreferences.getInstance();
      final token = prefs.getString('auth_token');
      if (token == null) return [];

      final response = await http.get(
        Uri.parse('${ApiConfig.baseUrl}/bookings/history'),
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'Authorization': 'Bearer $token',
        },
      );

      if (response.statusCode == 200) {
        final Map<String, dynamic> responseData = json.decode(response.body);
        if (responseData['status'] == 'success' && responseData['data'] != null) {
          final List<dynamic> list = responseData['data'];
          return List<Map<String, dynamic>>.from(list);
        }
      }
      return [];
    } catch (_) {
      return [];
    }
  }

  // Cancel a booking
  Future<Map<String, dynamic>> cancelBooking(String orderId) async {
    try {
      final prefs = await SharedPreferences.getInstance();
      final token = prefs.getString('auth_token');
      if (token == null) {
        return {'success': false, 'message': 'You must be logged in.'};
      }

      final response = await http.post(
        Uri.parse('${ApiConfig.baseUrl}/bookings/cancel'),
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'Authorization': 'Bearer $token',
        },
        body: json.encode({'order_id': orderId}),
      );

      final Map<String, dynamic> responseData = json.decode(response.body);
      if (response.statusCode == 200 && responseData['status'] == 'success') {
        return {
          'success': true,
          'message': responseData['message'] ?? 'Booking cancelled successfully.',
        };
      } else {
        return {
          'success': false,
          'message': responseData['message'] ?? 'Failed to cancel booking.',
        };
      }
    } catch (e) {
      return {
        'success': false,
        'message': 'Connection error occurred.',
      };
    }
  }
}
