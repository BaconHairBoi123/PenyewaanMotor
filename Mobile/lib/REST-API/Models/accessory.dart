import '../api_config.dart';

class Accessory {
  final int id;
  final String name;
  final int dailyPrice;
  final String? description;
  final String? imageUrl;

  Accessory({
    required this.id,
    required this.name,
    required this.dailyPrice,
    this.description,
    this.imageUrl,
  });

  factory Accessory.fromJson(Map<String, dynamic> json) {
    int priceInt = 0;
    if (json['daily_price'] != null) {
      if (json['daily_price'] is String) {
        priceInt = double.tryParse(json['daily_price'])?.toInt() ?? 0;
      } else if (json['daily_price'] is num) {
        priceInt = (json['daily_price'] as num).toInt();
      }
    }

    String? imgPath = json['image_path'];
    String? imgUrl = imgPath != null ? '${ApiConfig.imageUrl}/$imgPath' : json['image_url'];

    return Accessory(
      id: json['id'],
      name: json['name'] ?? '',
      dailyPrice: priceInt,
      description: json['description'],
      imageUrl: imgUrl,
    );
  }
}
