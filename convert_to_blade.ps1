# PowerShell script untuk mengkonversi HTML files ke Laravel Blade template
# Menggunakan layout inheritance dan components

# Definisi mapping untuk file-file
$fileMapping = @{
    "about" = "About Us"
    "blog" = "Blog"
    "blog-details" = "Blog Details"
    "blog-left-sidebar" = "Blog Left Sidebar"
    "blog-right-sidebar" = "Blog Right Sidebar"
    "blog-standard" = "Blog Standard"
    "car-list-v-1" = "Car List V1"
    "car-list-v-2" = "Car List V2"
    "car-list-v-3" = "Car List V3"
    "cars" = "Cars"
    "cart" = "Cart"
    "checkout" = "Checkout"
    "contact" = "Contact"
    "driver-details" = "Driver Details"
    "drivers" = "Drivers"
    "faq" = "FAQs"
    "listing-single" = "Listing Single"
    "pricing" = "Pricing"
    "product-details" = "Product Details"
    "products" = "Products"
    "services" = "Services"
    "testimonials" = "Testimonials"
    "404" = "404 Error"
    "sign-up" = "Sign Up"
    "login" = "Login"
    "wishlist" = "Wishlist"
}

$viewsPath = "C:\laragon\www\PenyewaanMotor\resources\views\user"

function Convert-HtmlToBladeTemplate {
    param(
        [string]$fileName,
        [string]$pageTitle
    )
    
    $htmlPath = "$viewsPath\$fileName.blade.php"
    
    if (!(Test-Path $htmlPath)) {
        Write-Host "File not found: $htmlPath" -ForegroundColor Red
        return $false
    }
    
    # Baca file HTML
    $content = Get-Content -Path $htmlPath -Raw
    
    # 1. Extract title from <title> tag jika belum pageTitle yang diberikan
    if ($pageTitle -eq "") {
        if ($content -match '<title>([^<]+)</title>') {
            $pageTitle = $matches[1].Trim()
            $pageTitle = $pageTitle -replace ' \|\| Gorent.*', '' # Clean up
        } else {
            $pageTitle = $fileName
        }
    }
    
    # 2. Extract content area (dari <div class="page-wrapper"> sampai footer)
    $pageContentMatch = $null
    if ($content -match '(?s)<div class="page-wrapper">(.*?)<!--Site Footer End-->') {
        $pageContent = $matches[1]
    } else {
        $pageContent = "<!-- Content akan diisi -->"
    }
    
    # 3. Buat template Blade
    $bladeContent = @"
@extends('user.layouts.app')

@section('title', '$pageTitle')

@section('content')
$pageContent
@endsection
"@
    
    # 4. Replace asset paths dengan {{ asset() }}
    $bladeContent = $bladeContent -replace 'href="assets/', 'href="{{ asset(''assets/'
    $bladeContent = $bladeContent -replace 'src="assets/', 'src="{{ asset(''assets/'
    
    # Handle closing quotes untuk asset()
    $bladeContent = $bladeContent -replace '(assets/[^"]*)"', '$1'') }}'
    
    # 5. Replace link href untuk internal pages dengan {{ route() }}
    # Contoh: href="about.html" -> href="{{ route('about') }}"
    $bladeContent = $bladeContent -replace 'href="([a-z0-9-]+)\.html"', 'href="{{ route(''$1'') }}"'
    
    # 6. Simpan file
    Set-Content -Path $htmlPath -Value $bladeContent -Force
    
    Write-Host "✓ Converted: $fileName.blade.php" -ForegroundColor Green
    return $true
}

# Main execution
$convertedCount = 0
$failedCount = 0

Write-Host "Starting Blade conversion process..." -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan

foreach ($file in $fileMapping.GetEnumerator()) {
    $fileName = $file.Name
    $pageTitle = $file.Value
    
    if (Convert-HtmlToBladeTemplate -fileName $fileName -pageTitle $pageTitle) {
        $convertedCount++
    } else {
        $failedCount++
    }
}

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Conversion Summary:" -ForegroundColor Cyan
Write-Host "  Converted: $convertedCount files" -ForegroundColor Green
Write-Host "  Failed: $failedCount files" -ForegroundColor $(if ($failedCount -gt 0) { "Red" } else { "Green" })
