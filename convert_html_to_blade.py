#!/usr/bin/env python3
import os
import re
from pathlib import Path

# Paths
USER_VIEWS_PATH = r"c:\laragon\www\PenyewaanMotor\resources\views\user"

# Files to convert
FILES_TO_CONVERT = [
    "about.blade.php",
    "blog.blade.php",
    "blog-details.blade.php",
    "blog-left-sidebar.blade.php",
    "blog-right-sidebar.blade.php",
    "blog-standard.blade.php",
    "car-list-v-1.blade.php",
    "car-list-v-2.blade.php",
    "car-list-v-3.blade.php",
    "cars.blade.php",
    "cart.blade.php",
    "checkout.blade.php",
    "contact.blade.php",
    "driver-details.blade.php",
    "drivers.blade.php",
    "faq.blade.php",
    "index-dark.blade.php",
    "index-one-page.blade.php",
    "index.blade.php",
    "index2-one-page.blade.php",
    "index2.blade.php",
    "index3-one-page.blade.php",
    "index3.blade.php",
    "listing-single.blade.php",
    "pricing.blade.php",
    "product-details.blade.php",
    "products.blade.php",
    "services.blade.php",
    "testimonials.blade.php",
    "404.blade.php",
]

def extract_title_from_html(content):
    """Extract title from <title> tag"""
    match = re.search(r'<title>\s*(.*?)\s*\|\|.*?</title>', content)
    if match:
        return match.group(1).strip()
    return "Page"

def extract_page_content(content):
    """Extract main page content between body tag and closing body tag"""
    # Find where the body content starts (after the header/nav structure)
    match = re.search(r'</header>\s*<div class="stricky-header.*?</div><!--.*?stricky-header\s*-->(.*?)</div><!--\s*/.page-wrapper\s*-->', content, re.DOTALL)
    
    if match:
        return match.group(1).strip()
    return None

def get_page_name_for_route(filename):
    """Map filename to route name"""
    mappings = {
        "index.blade.php": "home",
        "index-one-page.blade.php": "home.one-page",
        "index2.blade.php": "home2",
        "index2-one-page.blade.php": "home2.one-page",
        "index3.blade.php": "home3",
        "index3-one-page.blade.php": "home3.one-page",
        "index-dark.blade.php": "home.dark",
        "about.blade.php": "about",
        "services.blade.php": "services",
        "drivers.blade.php": "drivers",
        "driver-details.blade.php": "driver-details",
        "cars.blade.php": "cars",
        "car-list-v-1.blade.php": "car-list-v-1",
        "car-list-v-2.blade.php": "car-list-v-2",
        "car-list-v-3.blade.php": "car-list-v-3",
        "listing-single.blade.php": "listing-single",
        "products.blade.php": "products",
        "product-details.blade.php": "product-details",
        "cart.blade.php": "cart",
        "checkout.blade.php": "checkout",
        "wishlist.blade.php": "wishlist",
        "blog.blade.php": "blog",
        "blog-details.blade.php": "blog-details",
        "blog-standard.blade.php": "blog-standard",
        "blog-left-sidebar.blade.php": "blog-left-sidebar",
        "blog-right-sidebar.blade.php": "blog-right-sidebar",
        "contact.blade.php": "contact",
        "pricing.blade.php": "pricing",
        "testimonials.blade.php": "testimonials",
        "faq.blade.php": "faq",
        "404.blade.php": "404",
    }
    return mappings.get(filename, filename.replace('.blade.php', ''))

def convert_file(filepath):
    """Convert a single HTML file to Blade structure"""
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    filename = os.path.basename(filepath)
    title = extract_title_from_html(content)
    page_content = extract_page_content(content)
    
    if page_content is None:
        print(f"⚠️  Could not extract content from {filename}, keeping original structure")
        # Still convert to extends but keep all content
        new_content = f"""@extends('user.layouts.app')

@section('title', '{title}')

@section('content')
{content[content.find('<body'):]}

@endsection"""
    else:
        # Clean up title for display
        title_clean = re.sub(r'\s*\|\|.*', '', title).strip()
        
        new_content = f"""@extends('user.layouts.app')

@section('title', '{title_clean}')

@section('content')

{page_content}

@endsection"""
    
    # Replace asset paths
    new_content = new_content.replace('href="assets/', 'href="{{ asset(\'assets/')
    new_content = new_content.replace('href="assets/', 'href="{{ asset(\'assets/')
    new_content = re.sub(r'href="{{ asset\(\'assets/', 'href="{{ asset(\'assets/', new_content)
    new_content = new_content.replace('href="assets/', 'href="{{ asset(\'assets/')
    
    # Fix asset helper properly
    new_content = re.sub(
        r'href="assets/([^"]*)"',
        r'href="{{ asset(\'assets/\1\') }}"',
        new_content
    )
    new_content = re.sub(
        r'src="assets/([^"]*)"',
        r'src="{{ asset(\'assets/\1\') }}"',
        new_content
    )
    new_content = re.sub(
        r'style="background-image: url\(assets/([^)]*)\)"',
        r'style="background-image: url({{ asset(\'assets/\1\') }})"',
        new_content
    )
    
    # Clean up double conversions
    new_content = new_content.replace('{{ asset(\'assets/{{ asset(', '{{ asset(\'assets/')
    new_content = new_content.replace('\') }}\') }}', '\') }}')
    
    return new_content

def main():
    print("🚀 Starting conversion of HTML files to Blade structure...\n")
    
    converted = 0
    failed = 0
    
    for filename in FILES_TO_CONVERT:
        filepath = os.path.join(USER_VIEWS_PATH, filename)
        
        if not os.path.exists(filepath):
            print(f"❌ File not found: {filename}")
            failed += 1
            continue
        
        try:
            new_content = convert_file(filepath)
            
            # Write back to file
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(new_content)
            
            print(f"✅ Converted: {filename}")
            converted += 1
            
        except Exception as e:
            print(f"❌ Error converting {filename}: {str(e)}")
            failed += 1
    
    print(f"\n✨ Conversion complete!")
    print(f"   Converted: {converted}/{len(FILES_TO_CONVERT)}")
    print(f"   Failed: {failed}/{len(FILES_TO_CONVERT)}")

if __name__ == "__main__":
    main()
