import 'dart:convert';
import 'package:http/http.dart' as http;
import '../api_config.dart';
import '../Models/motorcycle.dart';

class MotorcycleService {
  Future<List<Motorcycle>> getMotorcycles() async {
    try {
      final response = await http.get(Uri.parse('${ApiConfig.baseUrl}/motorcycles'));

      if (response.statusCode == 200) {
        final Map<String, dynamic> responseData = json.decode(response.body);
        
        if (responseData['status'] == 'success') {
          final List<dynamic> data = responseData['data'];
          return data.map((json) => Motorcycle.fromJson(json)).toList();
        } else {
          throw Exception('Failed to load motorcycles: ${responseData['message']}');
        }
      } else {
        throw Exception('Failed to load motorcycles. Status Code: ${response.statusCode}');
      }
    } catch (e) {
      throw Exception('Network error: $e');
    }
  }
}
