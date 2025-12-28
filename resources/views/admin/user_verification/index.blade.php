<x-admin-layout title="User Verification Management">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">User Verification Management</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border-l-4 border-green-500">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 border-l-4 border-red-500">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 text-left text-sm uppercase tracking-wider">
                        <th class="p-4 font-semibold">Username</th>
                        <th class="p-4 font-semibold">Email</th>
                        <th class="p-4 font-semibold">Type</th>
                        <th class="p-4 font-semibold">Date</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($verifications as $v)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="p-4 font-medium text-gray-900">{{ $v->username }}</td>
                            <td class="p-4 text-gray-600">{{ $v->email }}</td>
                            <td class="p-4">
                                @if($v->verification_type == 'sim')
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-blue-100 text-blue-800">SIM</span>
                                @elseif($v->verification_type == 'course')
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-purple-100 text-purple-800">Course</span>
                                @else
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-gray-100 text-gray-800">Unverified</span>
                                @endif
                            </td>
                            <td class="p-4 text-gray-500 text-sm">{{ \Carbon\Carbon::parse($v->verification_date)->format('d M Y') }}</td>
                            <td class="p-4">
                                @if($v->status == 'verified')
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-green-100 text-green-800">Verified</span>
                                @elseif($v->status == 'pending')
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-yellow-100 text-yellow-800">Pending</span>
                                @elseif($v->status == 'rejected')
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-red-100 text-red-800">Rejected</span>
                                @elseif($v->status == 'class_required')
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-orange-100 text-orange-800">Class Req.</span>
                                @else
                                    <span class="px-2 py-1 rounded text-xs font-semibold bg-gray-100 text-gray-800">{{ ucfirst($v->status) }}</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                @if($v->verification_type == 'sim' && $v->status == 'pending')
                                    <button 
                                        onclick="showVerificationModal('{{ asset($v->face_photo_path) }}', '{{ asset($v->license_photo_path) }}', '{{ route('admin.user.verification.approve', $v->id) }}', '{{ route('admin.user.verification.reject', $v->id) }}')"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm transition shadow-md">
                                        Review
                                    </button>
                                @elseif($v->status == 'pending')
                                     <form action="{{ route('admin.user.verification.approve', $v->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm transition">
                                            Approve
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-sm italic">Processed</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-8 text-gray-500">
                                No verification requests found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Verification Modal -->
    <div id="verificationModal" class="fixed inset-0 bg-black bg-opacity-75 hidden flex items-center justify-center z-50 transition-opacity opacity-0 pointer-events-none">
        <div class="bg-white rounded-lg shadow-2xl p-6 max-w-4xl w-full transform scale-95 transition-transform" id="modalContent">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Verification Documents</h3>
                <button onclick="closeVerificationModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="text-center">
                    <p class="font-semibold text-gray-600 mb-2">Face Photo</p>
                    <div class="h-64 bg-gray-100 rounded flex items-center justify-center overflow-hidden border">
                        <img id="modalFace" src="" alt="Face Photo" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <div class="text-center">
                    <p class="font-semibold text-gray-600 mb-2">License (SIM)</p>
                    <div class="h-64 bg-gray-100 rounded flex items-center justify-center overflow-hidden border">
                        <img id="modalLicense" src="" alt="License Photo" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t">
                <form id="modalRejectForm" action="" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded shadow transition">Reject</button>
                </form>
                <form id="modalApproveForm" action="" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded shadow transition">Approve</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showVerificationModal(faceSrc, licenseSrc, approveUrl, rejectUrl) {
            const modal = document.getElementById('verificationModal');
            const content = document.getElementById('modalContent');
            
            document.getElementById('modalFace').src = faceSrc;
            document.getElementById('modalLicense').src = licenseSrc;
            
            document.getElementById('modalApproveForm').action = approveUrl;
            document.getElementById('modalRejectForm').action = rejectUrl;

            modal.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
            // Small timeout to allow removing hidden class before animating opacity
            setTimeout(() => {
                modal.classList.add('opacity-100', 'pointer-events-auto');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
        }

        function closeVerificationModal() {
            const modal = document.getElementById('verificationModal');
            const content = document.getElementById('modalContent');

            modal.classList.remove('opacity-100', 'pointer-events-auto');
            modal.classList.add('opacity-0', 'pointer-events-none');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // Match transition duration
        }

        // Close on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeVerificationModal();
            }
        });
    </script>

</x-admin-layout>
