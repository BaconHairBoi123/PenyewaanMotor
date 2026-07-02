import 'package:flutter/material.dart';
import 'package:url_launcher/url_launcher.dart';
import '../../../../core/app_theme.dart';
import '../../../../core/dialog_helper.dart';
import '../../../../REST-API/Services/auth_service.dart';
import '../../booking/history_screen.dart';
import '../../auth/update_verification_screen.dart';

class AccountTab extends StatefulWidget {
  final Function(int)? onTabSwitch;
  const AccountTab({super.key, this.onTabSwitch});

  @override
  State<AccountTab> createState() => _AccountTabState();
}

class _AccountTabState extends State<AccountTab> {
  final AuthService _authService = AuthService();
  Map<String, dynamic>? _userProfile;
  bool _isLoading = true;

  @override
  void initState() {
    super.initState();
    _loadProfile();
  }

  Future<void> _loadProfile() async {
    setState(() {
      _isLoading = true;
    });
    final profile = await _authService.getProfile();
    setState(() {
      _userProfile = profile;
      _isLoading = false;
    });
  }

  Future<void> _launchURL(String urlString) async {
    final Uri url = Uri.parse(urlString);
    try {
      await launchUrl(url, mode: LaunchMode.externalApplication);
    } catch (_) {
      if (mounted) {
        DialogHelper.showMessage(
          context: context,
          message: 'Could not open link: $urlString',
          isError: true,
        );
      }
    }
  }

  void _showFaqBottomSheet(BuildContext context) {
    showModalBottomSheet(
      context: context,
      isScrollControlled: true,
      backgroundColor: Colors.white,
      shape: const RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(top: Radius.circular(24)),
      ),
      builder: (context) {
        return DraggableScrollableSheet(
          initialChildSize: 0.6,
          maxChildSize: 0.9,
          minChildSize: 0.4,
          expand: false,
          builder: (context, scrollController) {
            return SingleChildScrollView(
              controller: scrollController,
              child: Padding(
                padding: const EdgeInsets.all(24.0),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Center(
                      child: Container(
                        width: 40,
                        height: 5,
                        decoration: BoxDecoration(
                          color: Colors.grey.shade300,
                          borderRadius: BorderRadius.circular(2.5),
                        ),
                      ),
                    ),
                    const SizedBox(height: 24),
                    const Text(
                      'Frequently Asked Questions (FAQ)',
                      style: TextStyle(
                        fontSize: 20, 
                        fontWeight: FontWeight.bold, 
                        color: AppTheme.darkColor,
                      ),
                    ),
                    const SizedBox(height: 16),
                    _buildFaqItem(
                      question: 'How do I rent a motorcycle?',
                      answer: 'Choose your preferred motorcycle from the Motorcycles catalog, click the Rent button, fill in the rental form, and confirm your payment.',
                    ),
                    _buildFaqItem(
                      question: 'What documents are required for rental?',
                      answer: 'For Indonesian Citizens (WNI): Original ID Card (KTP) and SIM C driving license. For Foreigners (WNA): Original Passport and a valid International Driving License.',
                    ),
                    _buildFaqItem(
                      question: 'Are helmets and raincoats included?',
                      answer: 'Yes! Every motorcycle rental includes 2 clean SNI-certified helmets, a raincoat, and a full tank of fuel.',
                    ),
                    _buildFaqItem(
                      question: 'What should I do if the vehicle has issues?',
                      answer: 'You can contact our emergency team through the Contact Us menu, or chat with our 24/7 AI Chatbot.',
                    ),
                  ],
                ),
              ),
            );
          },
        );
      },
    );
  }

  Widget _buildFaqItem({required String question, required String answer}) {
    return Container(
      margin: const EdgeInsets.only(bottom: 12),
      decoration: BoxDecoration(
        color: Colors.grey.shade50,
        borderRadius: BorderRadius.circular(12),
        border: Border.all(color: Colors.grey.shade200),
      ),
      child: ExpansionTile(
        title: Text(
          question,
          style: const TextStyle(
            fontWeight: FontWeight.bold, 
            fontSize: 14, 
            color: AppTheme.darkColor,
          ),
        ),
        children: [
          Padding(
            padding: const EdgeInsets.only(left: 16.0, right: 16.0, bottom: 16.0),
            child: Text(
              answer,
              style: TextStyle(color: Colors.grey.shade700, fontSize: 13, height: 1.4),
            ),
          )
        ],
      ),
    );
  }

  void _showContactBottomSheet(BuildContext context) {
    showModalBottomSheet(
      context: context,
      backgroundColor: Colors.white,
      shape: const RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(top: Radius.circular(24)),
      ),
      builder: (context) {
        return Padding(
          padding: const EdgeInsets.all(24.0),
          child: Column(
            mainAxisSize: MainAxisSize.min,
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Center(
                child: Container(
                  width: 40,
                  height: 5,
                  decoration: BoxDecoration(
                    color: Colors.grey.shade300,
                    borderRadius: BorderRadius.circular(2.5),
                  ),
                ),
              ),
              const SizedBox(height: 24),
              const Text(
                'Contact Us',
                style: TextStyle(
                  fontSize: 20, 
                  fontWeight: FontWeight.bold, 
                  color: AppTheme.darkColor,
                ),
              ),
              const SizedBox(height: 8),
              Text(
                'Reach out to our support team for any questions or rental inquiries.',
                style: TextStyle(color: Colors.grey.shade600, fontSize: 14),
              ),
              const SizedBox(height: 24),
              ListTile(
                leading: CircleAvatar(
                  backgroundColor: Colors.green.shade50,
                  child: const Icon(Icons.phone, color: Colors.green),
                ),
                title: const Text('WhatsApp Hotline'),
                subtitle: const Text('+62 812-3456-7890'),
                trailing: const Icon(Icons.open_in_new, size: 18),
                onTap: () => _launchURL('https://wa.me/6281234567890'),
              ),
              const Divider(height: 1),
              ListTile(
                leading: CircleAvatar(
                  backgroundColor: Colors.blue.shade50,
                  child: const Icon(Icons.email_outlined, color: Colors.blue),
                ),
                title: const Text('Email Support'),
                subtitle: const Text('support@ridenusa.com'),
                trailing: const Icon(Icons.open_in_new, size: 18),
                onTap: () => _launchURL('mailto:support@ridenusa.com?subject=RideNusa%20Inquiry'),
              ),
              const Divider(height: 1),
              ListTile(
                leading: CircleAvatar(
                  backgroundColor: Colors.orange.shade50,
                  child: const Icon(Icons.location_on_outlined, color: Colors.orange),
                ),
                title: const Text('Office Address'),
                subtitle: const Text('Jl. Sunset Road No. 88, Kuta, Bali'),
              ),
            ],
          ),
        );
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    final String displayName = _userProfile?['name'] ?? 'Guest User';
    final String displayEmail = _userProfile?['email'] ?? 'guest@ridenusa.com';
    final bool isGuest = _userProfile == null;

    return RefreshIndicator(
      onRefresh: _loadProfile,
      color: AppTheme.primaryColor,
      child: LayoutBuilder(
        builder: (context, constraints) {
          return SingleChildScrollView(
            physics: const AlwaysScrollableScrollPhysics(),
            child: ConstrainedBox(
              constraints: BoxConstraints(
                minHeight: constraints.maxHeight,
              ),
              child: Padding(
                padding: const EdgeInsets.all(24.0),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const SizedBox(height: 16),
                    Center(
                      child: CircleAvatar(
                        radius: 50,
                        backgroundColor: AppTheme.primaryColor.withOpacity(0.15),
                        child: const Icon(Icons.person, size: 50, color: AppTheme.primaryColor),
                      ),
                    ),
                    const SizedBox(height: 16),
                    Center(
                      child: _isLoading
                          ? const SizedBox(
                              width: 20,
                              height: 20,
                              child: CircularProgressIndicator(strokeWidth: 2, color: AppTheme.primaryColor),
                            )
                          : Text(
                              displayName,
                              style: const TextStyle(fontSize: 22, fontWeight: FontWeight.bold, color: AppTheme.darkColor),
                            ),
                    ),
                    const SizedBox(height: 8),
                    Center(
                      child: _isLoading
                          ? const SizedBox.shrink()
                          : Text(
                              displayEmail,
                              style: TextStyle(fontSize: 14, color: Colors.grey.shade600),
                            ),
                    ),
                    const SizedBox(height: 32),
                    const Divider(),
                    ListTile(
                      leading: const Icon(Icons.help_outline, color: AppTheme.darkColor),
                      title: const Text('FAQ', style: TextStyle(fontWeight: FontWeight.w600)),
                      trailing: const Icon(Icons.chevron_right),
                      onTap: () => _showFaqBottomSheet(context),
                    ),
                    const Divider(height: 1),
                    ListTile(
                      leading: const Icon(Icons.contact_support_outlined, color: AppTheme.darkColor),
                      title: const Text('Contact Us', style: TextStyle(fontWeight: FontWeight.w600)),
                      trailing: const Icon(Icons.chevron_right),
                      onTap: () => _showContactBottomSheet(context),
                    ),
                    const Divider(height: 1),
                    ListTile(
                      leading: const Icon(Icons.history, color: AppTheme.darkColor),
                      title: const Text('Rental History', style: TextStyle(fontWeight: FontWeight.w600)),
                      trailing: const Icon(Icons.chevron_right),
                      onTap: () async {
                        if (isGuest) {
                          DialogHelper.showMessage(
                            context: context,
                            message: 'Please login first to view rental history.',
                            isError: true,
                          );
                        } else {
                          final navigator = Navigator.of(context);
                          final result = await navigator.push(
                            AppTheme.animatedRoute(const HistoryScreen()),
                          );
                          if (result is int && mounted && widget.onTabSwitch != null) {
                            widget.onTabSwitch!(result);
                          }
                        }
                      },
                    ),
                    if (!isGuest) ...[
                      const Divider(height: 1),
                      ListTile(
                        leading: Icon(
                          _userProfile?['verification_status'] == 'verified' ? Icons.verified_user : Icons.gpp_maybe_outlined,
                          color: _userProfile?['verification_status'] == 'verified' ? Colors.green : Colors.orange,
                        ),
                        title: const Text('Account Verification', style: TextStyle(fontWeight: FontWeight.w600)),
                        subtitle: Text(
                          _userProfile?['verification_status'] == 'verified'
                              ? 'Your account is verified and ready for rental.'
                              : 'Verification pending or incomplete. Tap to update SIM & Selfie.',
                          style: TextStyle(fontSize: 12, color: Colors.grey.shade600),
                        ),
                        trailing: _userProfile?['verification_status'] == 'verified' ? null : const Icon(Icons.chevron_right),
                        onTap: _userProfile?['verification_status'] == 'verified'
                            ? null
                            : () async {
                                final navigator = Navigator.of(context);
                                final result = await navigator.push(
                                  AppTheme.animatedRoute(const UpdateVerificationScreen()),
                                );
                                if (result == true && mounted) {
                                  _loadProfile();
                                }
                              },
                      ),
                    ],
                    const SizedBox(height: 40),
                    SizedBox(
                      width: double.infinity,
                      child: isGuest
                          ? ElevatedButton(
                              style: ElevatedButton.styleFrom(
                                backgroundColor: AppTheme.primaryColor,
                                foregroundColor: Colors.white,
                                padding: const EdgeInsets.symmetric(vertical: 14),
                              ),
                              onPressed: () {
                                Navigator.pushReplacementNamed(context, '/');
                              },
                              child: const Text('Login / Sign Up', style: TextStyle(fontWeight: FontWeight.bold)),
                            )
                          : OutlinedButton(
                              style: OutlinedButton.styleFrom(
                                side: const BorderSide(color: Colors.redAccent),
                                padding: const EdgeInsets.symmetric(vertical: 14),
                              ),
                              onPressed: () async {
                                await _authService.logout();
                                if (context.mounted) {
                                  Navigator.pushReplacementNamed(context, '/');
                                }
                              },
                              child: const Text('Logout', style: TextStyle(color: Colors.redAccent, fontWeight: FontWeight.bold)),
                            ),
                    ),
                    const SizedBox(height: 16),
                  ],
                ),
              ),
            ),
          );
        },
      ),
    );
  }
}
