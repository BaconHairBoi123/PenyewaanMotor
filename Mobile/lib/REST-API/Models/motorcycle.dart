import '../api_config.dart';

class Motorcycle {
  final int id;
  final String category;
  final String brand;
  final String type;
  final String cc;
  final String transmission;
  final int price;
  final String? imageUrl;
  final String status;
  final String fuelConfiguration;
  final List<String> gallery;

  Motorcycle({
    required this.id,
    required this.category,
    required this.brand,
    required this.type,
    required this.cc,
    required this.transmission,
    required this.price,
    this.imageUrl,
    required this.status,
    required this.fuelConfiguration,
    required this.gallery,
  });

  factory Motorcycle.fromJson(Map<String, dynamic> json) {
    String typeRaw = json['type'] ?? '';
    String typeFormatted = typeRaw.replaceAll('_', ' ');
    typeFormatted = typeFormatted.split(' ').map((str) => str.isNotEmpty ? '${str[0].toUpperCase()}${str.substring(1)}' : '').join(' ');

    int priceInt = 0;
    if (json['price'] != null) {
      if (json['price'] is String) {
        priceInt = double.tryParse(json['price'])?.toInt() ?? 0;
      } else if (json['price'] is num) {
        priceInt = (json['price'] as num).toInt();
      }
    }

    // image_path from DB already includes the folder prefix, e.g. "motorcycles/filename.jpg"
    // So we just append it to the storage base URL directly
    String? imgPath = json['image_path'];
    String? imgUrl = imgPath != null ? '${ApiConfig.imageUrl}/$imgPath' : json['image_url'];

    final List<dynamic> galleryJson = json['images'] ?? json['gallery'] ?? [];
    final List<String> galleryList = [];
    for (var img in galleryJson) {
      if (img is Map && img['image_url'] != null) {
        galleryList.add(img['image_url'].toString());
      } else if (img is Map && img['image_path'] != null) {
        galleryList.add('${ApiConfig.imageUrl}/${img['image_path']}');
      }
    }
    
    if (imgUrl != null && imgUrl.isNotEmpty) {
      galleryList.insert(0, imgUrl);
    }

    return Motorcycle(
      id: json['id'],
      category: json['category'] ?? '',
      brand: json['brand'] ?? '',
      type: typeFormatted,
      cc: json['cc']?.toString() ?? '',
      transmission: json['transmission'] ?? 'Matic',
      price: priceInt,
      imageUrl: imgUrl,
      status: json['status'] ?? 'Available',
      fuelConfiguration: json['fuel_configuration'] ?? '',
      gallery: galleryList,
    );
  }
}
