<x-admin-layout title="Location Management">
    <h1 class="text-xl font-bold mb-6">Location Management</h1>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- GPS Device Tracker Section -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="font-bold text-lg mb-4 text-gray-800">GPS Device Tracker</h2>
        
        <div x-data="gpsTracker()" class="space-y-4">
            <!-- Device Dropdown -->
            <div class="flex flex-col">
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Device GPS</label>
                <div class="relative">
                    <input 
                        type="text"
                        x-model="searchQuery"
                        @input="filterDevices()"
                        placeholder="Search device by code, name, or motorcycle plate..."
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    
                    <!-- Dropdown List -->
                    <div x-show="showDropdown && filteredDevices.length > 0" 
                         class="absolute top-full left-0 right-0 bg-white border border-gray-300 rounded shadow-lg max-h-64 overflow-y-auto z-10 mt-1">
                        <template x-for="device in filteredDevices" :key="device.id">
                            <div @click="selectDevice(device)"
                                 class="px-4 py-2 cursor-pointer hover:bg-blue-100 border-b border-gray-100 last:border-b-0">
                                <div class="font-medium text-sm"><span x-text="(device.device_code || 'N/A') + ' - ' + (device.device_name || 'N/A')"></span></div>
                                <div class="text-xs text-gray-500">Plate: <span x-text="device.motorcycle_plate"></span></div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Selected Device Info -->
            <template x-if="selectedDevice">
                <div class="bg-blue-50 border border-blue-200 rounded p-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Device Code</p>
                            <p class="font-semibold" x-text="selectedDevice.device_code"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Device Name</p>
                            <p class="font-semibold" x-text="selectedDevice.device_name"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Motorcycle Plate</p>
                            <p class="font-semibold" x-text="selectedDevice.motorcycle_plate"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Last Updated</p>
                            <p class="font-semibold text-sm" x-text="selectedDevice.latest_location ? new Date(selectedDevice.latest_location.updated_at).toLocaleString() : 'No data'"></p>
                        </div>
                    </div>
                    <div class="mt-4 grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <div class="bg-white border border-gray-200 rounded p-4">
                            <p class="text-sm text-gray-600 mb-1">Relay Status</p>
                            <p class="font-semibold text-lg" x-text="selectedDevice.relay_status || 'ON'"></p>
                        </div>
                        <div class="flex items-center">
                            <button type="button"
                                class="w-full px-4 py-2 rounded text-white font-semibold transition-colors duration-200"
                                :class="selectedDevice.relay_status === 'OFF' ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700'"
                                x-text="selectedDevice.relay_status === 'OFF' ? 'Nyalakan Motor' : 'Matikan Motor'"
                                @click="toggleRelay()"
                            ></button>
                        </div>
                    </div>
                    
                    <!-- Location Info -->
                    <template x-if="selectedDevice.latest_location">
                        <div class="mt-4 pt-4 border-t border-blue-200">
                            <p class="text-sm text-gray-600 mb-2">Current Location</p>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <span class="text-gray-600">Latitude:</span>
                                    <p class="font-mono font-semibold" x-text="selectedDevice.latest_location.latitude"></p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Longitude:</span>
                                    <p class="font-mono font-semibold" x-text="selectedDevice.latest_location.longitude"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            <!-- Map Display -->
            <template x-if="selectedDevice && selectedDevice.latest_location">
                <div class="border border-gray-300 rounded overflow-hidden">
                    <div id="map" style="height: 500px; width: 100%;" class="rounded"></div>
                </div>
            </template>

            <template x-if="selectedDevice && !selectedDevice.latest_location">
                <div class="bg-yellow-50 border border-yellow-200 rounded p-4 text-yellow-800">
                    <p>No GPS location data available for this device yet.</p>
                </div>
            </template>
        </div>
    </div>

    <!-- Manual Location Entry Section -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="font-bold text-lg mb-4 text-gray-800">Add Manual Location</h2>
        <form method="POST" action="{{ route('admin.locations.store') }}" class="flex flex-wrap gap-4 items-end">
            @csrf
            <div class="flex-1 min-w-50">
                <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                <input type="number" name="latitude" placeholder="e.g., -6.2088" step="any" 
                    class="border border-gray-300 p-2 rounded w-full focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex-1 min-w-50">
                <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                <input type="number" name="longitude" placeholder="e.g., 106.8456" step="any" 
                    class="border border-gray-300 p-2 rounded w-full focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-medium">
                Add Location
            </button>
        </form>
    </div>

    <!-- Locations Table -->
    <div class="bg-white rounded shadow overflow-hidden">
        <h2 class="font-bold text-lg p-6 border-b bg-gray-50 text-gray-800">All Locations</h2>
        
        @if($locations->count() > 0)
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr class="text-left">
                    <th class="p-3 text-sm font-semibold">ID</th>
                    <th class="p-3 text-sm font-semibold">Latitude</th>
                    <th class="p-3 text-sm font-semibold">Longitude</th>
                    <th class="p-3 text-sm font-semibold">Device</th>
                    <th class="p-3 text-sm font-semibold">Created At</th>
                    <th class="p-3 text-sm font-semibold text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($locations as $location)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-3">{{ $location->id }}</td>
                    <td class="p-3 font-mono text-sm">{{ $location->latitude }}</td>
                    <td class="p-3 font-mono text-sm">{{ $location->longitude }}</td>
                    <td class="p-3 text-sm">
                        @if($location->device)
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">{{ $location->device->device_code }}</span>
                        @else
                            <span class="text-gray-500">Manual</span>
                        @endif
                    </td>
                    <td class="p-3 text-sm text-gray-600">{{ $location->created_at ? $location->created_at->format('M d, Y H:i') : 'N/A' }}</td>
                    <td class="p-3 text-center">
                        <div class="flex justify-center items-center">
                            <form action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-1.5 bg-red-600 text-white rounded text-sm hover:bg-red-700 transition shadow-sm font-medium">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">No locations found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @else
        <div class="p-6 text-center text-gray-500">
            No locations recorded yet.
        </div>
        @endif
    </div>

    <!-- Leaflet Map & Alpine.js Script -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.min.js"></script>

    <script>
        function gpsTracker() {
            return {
                devices: {!! json_encode($devices) !!},
                filteredDevices: {!! json_encode($devices) !!},
                selectedDevice: null,
                searchQuery: '',
                showDropdown: false,
                map: null,
                marker: null,
                csrfToken: document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',

                init() {
                    // Poll for new location updates and relay status every 3 seconds for the selected device
                    setInterval(() => {
                        this.fetchLatestLocation();
                        this.fetchRelayStatus();
                    }, 3000);
                },

                async fetchRelayStatus() {
                    if (!this.selectedDevice) return;

                    try {
                        const params = new URLSearchParams({ device_code: this.selectedDevice.device_code });
                        const response = await fetch(`/api/gps/status-relay?${params.toString()}`);
                        if (!response.ok) return;

                        const result = await response.json();
                        if (result.status === 'success' && result.data) {
                            this.selectedDevice.relay_status = result.data.relay_status || 'ON';
                        }
                    } catch (error) {
                        console.error('Failed to fetch relay status:', error);
                    }
                },

                async toggleRelay() {
                    if (!this.selectedDevice) return;

                    const nextStatus = this.selectedDevice.relay_status === 'OFF' ? 'ON' : 'OFF';

                    try {
                        const response = await fetch(`/admin/devices/${this.selectedDevice.id}/relay`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': this.csrfToken,
                            },
                            body: JSON.stringify({ relay_status: nextStatus }),
                        });

                        const result = await response.json();
                        if (response.ok && result.status === 'success') {
                            this.selectedDevice.relay_status = result.data.relay_status;
                            Swal.fire({
                                icon: 'success',
                                title: 'Relay updated',
                                text: `Perintah berhasil disimpan: ${result.data.relay_status}`,
                                timer: 1500,
                                showConfirmButton: false,
                            });
                        } else {
                            throw new Error(result.message || 'Gagal memperbarui relay');
                        }
                    } catch (error) {
                        console.error('Failed to toggle relay status:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Tidak dapat mengubah status relay saat ini.',
                        });
                    }
                },

                async fetchLatestLocation() {
                    if (!this.selectedDevice) return;

                    try {
                        const response = await fetch(`/api/gps/latest/${this.selectedDevice.id}`);
                        if (!response.ok) return;

                        const result = await response.json();
                        if (result.status === 'success' && result.data) {
                            // Update the selected device's latest_location object
                            this.selectedDevice.latest_location = result.data;
                            
                            // Re-render map and marker
                            this.initializeMap();
                        }
                    } catch (error) {
                        console.error('Failed to fetch latest GPS coordinates:', error);
                    }
                },

                filterDevices() {
                    const query = this.searchQuery.toLowerCase();
                    if (!query) {
                        this.filteredDevices = this.devices;
                        this.showDropdown = false;
                        return;
                    }
                    
                    this.filteredDevices = this.devices.filter(device => 
                        (device.device_code && device.device_code.toLowerCase().includes(query)) ||
                        (device.device_name && device.device_name.toLowerCase().includes(query)) ||
                        (device.motorcycle_plate && device.motorcycle_plate.toLowerCase().includes(query))
                    );
                    this.showDropdown = true;
                },

                selectDevice(device) {
                    this.selectedDevice = device;
                    this.searchQuery = `${device.device_code} - ${device.device_name}`;
                    this.showDropdown = false;
                    
                    // Initialize or update map
                    this.$nextTick(() => {
                        this.initializeMap();
                    });
                },

                 initializeMap() {
                    if (!this.selectedDevice || !this.selectedDevice.latest_location) return;

                    const lat = parseFloat(this.selectedDevice.latest_location.latitude);
                    const lng = parseFloat(this.selectedDevice.latest_location.longitude);

                    if (!this.map) {
                        // First initialization
                        this.map = L.map('map').setView([lat, lng], 15);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '© OpenStreetMap contributors',
                            maxZoom: 19,
                        }).addTo(this.map);
                    } else {
                        // Preserve the zoom level set by the user
                        const currentZoom = this.map.getZoom();
                        this.map.setView([lat, lng], currentZoom);
                    }

                    const popupContent = `<div class="text-sm"><strong>${this.selectedDevice.device_code}</strong><br>
                        Plate: ${this.selectedDevice.motorcycle_plate}<br>
                        Lat: ${lat.toFixed(6)}<br>
                        Lng: ${lng.toFixed(6)}</div>`;

                    // Update existing marker instead of recreating it (keeps popup open if selected)
                    if (this.marker) {
                        this.marker.setLatLng([lat, lng]);
                        this.marker.setPopupContent(popupContent);
                    } else {
                        // Create new marker
                        this.marker = L.marker([lat, lng])
                            .addTo(this.map)
                            .bindPopup(popupContent)
                            .openPopup();
                    }
                }
            };
        }
    </script>

</x-admin-layout>
