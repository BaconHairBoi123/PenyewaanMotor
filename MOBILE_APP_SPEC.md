# RideNusa Mobile App Design Specification

## Overview
This document outlines the design and user flow for the RideNusa Mobile App, ensuring consistency with the web platform while optimizing for a mobile-first experience.

## Brand Identity
*   **Primary Color:** `#FFB51D` (Orange-Yellow) - Used for primary actions, highlights, and branding.
*   **Secondary Color:** `#2F2F2F` (Dark Gray) - Used for headers, text, and dark-themed components.
*   **Background:** `#F6F6FF` (Light Gray/Blue) - Used for screen backgrounds to maintain a clean look.
*   **Surface:** `#FFFFFF` (White) - Used for cards, inputs, and modals.
*   **Typography:** Inter (Sans-serif)
    *   H1: 24px Bold (Screen Titles)
    *   H2: 18px SemiBold (Section Headers)
    *   Body: 14px Regular (General Content)
    *   Caption: 12px Regular (Metadata, Small labels)

## App Flow (Consistent with Web)

### 1. Splash Screen
*   **Visuals:** RideNusa Logo in the center on a Dark (#2F2F2F) background.
*   **Action:** "Get Started" button (Primary Orange) at the bottom.
*   **Transition:** To Login/Register.

### 2. Login & Registration
*   **Visuals:** Clean forms on White background.
*   **Flow:** 
    *   User enters credentials -> Success -> Redirect to Home.
    *   No account? -> Register -> Fill Profile -> Redirect to Home.

### 3. Home Screen (Dashboard)
*   **Top Bar:** User greeting ("Hi, [Name]!") and Notification icon.
*   **Search Bar:** "Cari motor impianmu..."
*   **Categories:** Horizontal scroll (Matic, Sport, Trail, etc.).
*   **Motor List:** Vertical list of Cards (Image, Name, Price/Day, Rating).

### 4. Motorcycle Detail
*   **Top:** Large image gallery of the motor.
*   **Content:**
    *   Name & Type.
    *   Price per day.
    *   Specs: Transmission, CC, Fuel Type.
    *   Description.
*   **Bottom Action:** Floating "Sewa Sekarang" button (Primary Orange).

### 5. Booking & Checkout
*   **Step 1:** Select Date Range (Calendar picker).
*   **Step 2:** Select Pickup/Delivery Location.
*   **Step 3:** Summary & Payment selection.
*   **Action:** "Konfirmasi Pembayaran".

### 6. Booking Success
*   **Visuals:** Green checkmark animation.
*   **Text:** "Pemesanan Berhasil! Silakan cek riwayat transaksi."
*   **Action:** "Kembali ke Home" or "Lihat Riwayat".

## Implementation Script (Figma API)
*The following script can be executed in the Figma console by a user with "Full" permissions to automatically generate the foundation.*

```javascript
// Run this in Figma Console
(async () => {
  // Load Fonts
  await figma.loadFontAsync({ family: "Inter", style: "Regular" });
  await figma.loadFontAsync({ family: "Inter", style: "Bold" });
  await figma.loadFontAsync({ family: "Inter", style: "Semi Bold" });

  // Create Variables
  const collection = figma.variables.createVariableCollection("Brand");
  const primary = figma.variables.createVariable("color/primary", collection, "COLOR");
  primary.setValueForMode(collection.modes[0].modeId, { r: 1, g: 0.71, b: 0.11 });
  
  const dark = figma.variables.createVariable("color/dark", collection, "COLOR");
  dark.setValueForMode(collection.modes[0].modeId, { r: 0.18, g: 0.18, b: 0.18 });

  // Create Screen Frames
  const screens = ["Splash", "Login", "Home", "Detail", "Booking", "Success"];
  let offset = 0;
  for (const name of screens) {
    const frame = figma.createFrame();
    frame.name = name;
    frame.resize(375, 812);
    frame.x = offset;
    offset += 425;
    
    // Set background for Splash and others
    if (name === "Splash") {
      frame.fills = [{ type: 'SOLID', color: { r: 0.18, g: 0.18, b: 0.18 } }];
    } else {
      frame.fills = [{ type: 'SOLID', color: { r: 0.96, g: 0.96, b: 1 } }];
    }
  }
  
  console.log("Mockup foundation created!");
})();
```
