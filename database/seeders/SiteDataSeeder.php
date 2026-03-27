<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SiteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Clear existing data
        $this->clearTables();

        // Seed website details
        $this->seedWebsiteDetails();

        // Seed users
        $this->seedUsers();

        // Seed services and bullet points
        $this->seedServices();

        // Seed FAQs
        $this->seedFaqs();

        // Seed testimonials
        $this->seedTestimonials();

        // Seed Why Us section
        $this->seedWhyUs();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Clear all related tables
     */
    private function clearTables(): void
    {
        DB::table('why_us_items')->truncate();
        DB::table('why_us')->truncate();
        DB::table('testimonials')->truncate();
        DB::table('faqs')->truncate();
        DB::table('service_bullet_points')->truncate();
        DB::table('services')->truncate();
        DB::table('users')->truncate();
        DB::table('website_details')->truncate();
    }

    /**
     * Seed website details
     */
    private function seedWebsiteDetails(): void
    {
        DB::table('website_details')->insert([
            'id' => 1,
            'website_name' => 'Eventex Solutions',
            'phone_number_1' => '7011864373',
            'phone_number_2' => '9911550920',
            'phone_number_3' => '7053152217',
            'email' => 'info@eventexsolutions.com',
            'address' => 'Plot 303 Main Shyam Park Sahibabad GZB 201005',
            'facebook_link' => 'https://facebook.com/eventexsolutions',
            'instagram_link' => 'https://instagram.com/eventexsolutions',
            'linkedin_link' => 'https://linkedin.com/eventexsolutions',
            'justdial_link' => 'https://justdial.com/eventexsolutions',
            'instamart_link' => 'https://instamart.com/eventexsolutions',
            'whatsapp_link' => 'https://wa.me/7011864373',
            'created_at' => Carbon::parse('2026-03-27 05:15:36'),
            'updated_at' => Carbon::parse('2026-03-27 05:15:36'),
        ]);
    }

    /**
     * Seed users
     */
    private function seedUsers(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Eventex Admin',
            'email' => 'admin@eventexsolutions.com',
            'email_verified_at' => null,
            'password' => '$2y$12$8gM5RzAhTwqhdLfv8Ee3buUem.EOnSG4lWGIVTbumj7or6Pzqj63q',
            'remember_token' => 'hIf42XprLKBza1pLDVjLAXgwjIju7Hvd408IGABhI3RpgG1U9cmUifaYjMwH',
            'created_at' => Carbon::parse('2026-03-27 05:12:21'),
            'updated_at' => Carbon::parse('2026-03-27 05:12:21'),
        ]);
    }

    /**
     * Seed services and their bullet points
     */
    private function seedServices(): void
    {
        $services = [
            [
                'id' => 1,
                'title' => 'Multi-Camera Live Streaming',
                'description' => 'High-quality live streaming for events and conferences.',
                'icon' => 'fas fa-video',
                'order' => 1,
                'is_active' => 1,
                'created_at' => Carbon::parse('2026-03-27 06:07:23'),
                'updated_at' => Carbon::parse('2026-03-27 06:07:23'),
                'bullet_points' => [
                    ['bullet_point' => 'Multi-camera coverage', 'icon' => 'fas fa-check-circle', 'order' => 0],
                    ['bullet_point' => 'Corporate & private events', 'icon' => 'fas fa-check-circle', 'order' => 1],
                    ['bullet_point' => 'Real-time streaming', 'icon' => 'fas fa-check-circle', 'order' => 2],
                    ['bullet_point' => 'Social Media Streaming', 'icon' => 'fas fa-check-circle', 'order' => 3],
                    ['bullet_point' => 'Professional audio & video', 'icon' => 'fas fa-check-circle', 'order' => 4],
                    ['bullet_point' => 'Event recording', 'icon' => 'fas fa-check-circle', 'order' => 5],
                ],
            ],
            [
                'id' => 2,
                'title' => 'Photography & Videography Services',
                'description' => 'Capture every moment beautifully with professional photography and videography.',
                'icon' => 'fas fa-camera',
                'order' => 2,
                'is_active' => 1,
                'created_at' => Carbon::parse('2026-03-27 06:09:29'),
                'updated_at' => Carbon::parse('2026-03-27 06:09:29'),
                'bullet_points' => [
                    ['bullet_point' => 'Event photography & videography', 'icon' => 'fas fa-check-circle', 'order' => 0],
                    ['bullet_point' => 'Weddings & birthdays coverage', 'icon' => 'fas fa-check-circle', 'order' => 1],
                    ['bullet_point' => 'Corporate & society events', 'icon' => 'fas fa-check-circle', 'order' => 2],
                    ['bullet_point' => 'High-quality edited photos & videos', 'icon' => 'fas fa-check-circle', 'order' => 3],
                    ['bullet_point' => 'Drone & aerial shots', 'icon' => 'fas fa-check-circle', 'order' => 4],
                    ['bullet_point' => 'Candid & professional shots', 'icon' => 'fas fa-check-circle', 'order' => 5],
                    ['bullet_point' => 'Photo albums & video reels', 'icon' => 'fas fa-check-circle', 'order' => 6],
                    ['bullet_point' => 'Fast delivery & digital sharing', 'icon' => 'fas fa-check-circle', 'order' => 7],
                ],
            ],
            [
                'id' => 3,
                'title' => 'Event Decoration & Sound Setup',
                'description' => 'Transform your venue with stunning decor and crystal-clear sound for every event.',
                'icon' => 'fas fa-microphone',
                'order' => 3,
                'is_active' => 1,
                'created_at' => Carbon::parse('2026-03-27 06:12:10'),
                'updated_at' => Carbon::parse('2026-03-27 06:12:10'),
                'bullet_points' => [
                    ['bullet_point' => 'Creative event decorations', 'icon' => 'fas fa-check-circle', 'order' => 0],
                    ['bullet_point' => 'Stage & venue styling', 'icon' => 'fas fa-check-circle', 'order' => 1],
                    ['bullet_point' => 'Lighting arrangements', 'icon' => 'fas fa-check-circle', 'order' => 2],
                    ['bullet_point' => 'Professional sound system', 'icon' => 'fas fa-check-circle', 'order' => 3],
                    ['bullet_point' => 'DJ & live music support', 'icon' => 'fas fa-check-circle', 'order' => 4],
                    ['bullet_point' => 'Ambient & theme-based setups', 'icon' => 'fas fa-check-circle', 'order' => 5],
                    ['bullet_point' => 'Hassle-free installation & teardown', 'icon' => 'fas fa-check-circle', 'order' => 6],
                    ['bullet_point' => 'Tailored for weddings, parties & corporate events', 'icon' => 'fas fa-check-circle', 'order' => 7],
                ],
            ],
            [
                'id' => 4,
                'title' => 'Stalls, Tents & Catering',
                'description' => 'Organize vibrant stalls, comfortable tents, and tasty snacks for any event.',
                'icon' => 'fas fa-user-tie',
                'order' => 4,
                'is_active' => 1,
                'created_at' => Carbon::parse('2026-03-27 06:15:09'),
                'updated_at' => Carbon::parse('2026-03-27 06:15:09'),
                'bullet_points' => [
                    ['bullet_point' => 'Custom event stalls & tents', 'icon' => 'fas fa-check-circle', 'order' => 0],
                    ['bullet_point' => 'Food & snack arrangements', 'icon' => 'fas fa-check-circle', 'order' => 1],
                    ['bullet_point' => 'Corporate & community events', 'icon' => 'fas fa-check-circle', 'order' => 2],
                    ['bullet_point' => 'Birthday, wedding & fair setups', 'icon' => 'fas fa-check-circle', 'order' => 3],
                    ['bullet_point' => 'Exhibition & product stalls', 'icon' => 'fas fa-check-circle', 'order' => 4],
                    ['bullet_point' => 'Hassle-free setup & teardown', 'icon' => 'fas fa-check-circle', 'order' => 5],
                    ['bullet_point' => 'Themed decor for stalls & tents', 'icon' => 'fas fa-check-circle', 'order' => 6],
                ],
            ],
            [
                'id' => 5,
                'title' => 'Big Screen Casting & Live Coverage',
                'description' => 'Stream and display your events live on big screens with full recording.',
                'icon' => 'fas fa-image',
                'order' => 5,
                'is_active' => 1,
                'created_at' => Carbon::parse('2026-03-27 06:17:56'),
                'updated_at' => Carbon::parse('2026-03-27 06:17:56'),
                'bullet_points' => [
                    ['bullet_point' => 'Live event broadcasting', 'icon' => 'fas fa-check-circle', 'order' => 0],
                    ['bullet_point' => 'Big screen projection', 'icon' => 'fas fa-check-circle', 'order' => 1],
                    ['bullet_point' => 'Multi-camera coverage', 'icon' => 'fas fa-check-circle', 'order' => 2],
                    ['bullet_point' => 'Professional audio & video', 'icon' => 'fas fa-check-circle', 'order' => 3],
                    ['bullet_point' => 'Recording for later use', 'icon' => 'fas fa-check-circle', 'order' => 4],
                    ['bullet_point' => 'Corporate & private events', 'icon' => 'fas fa-check-circle', 'order' => 5],
                    ['bullet_point' => 'Seamless setup & execution', 'icon' => 'fas fa-check-circle', 'order' => 6],
                ],
            ],
        ];

        foreach ($services as $serviceData) {
            $bulletPoints = $serviceData['bullet_points'];
            unset($serviceData['bullet_points']);
            
            DB::table('services')->insert($serviceData);
            
            foreach ($bulletPoints as $bulletPoint) {
                DB::table('service_bullet_points')->insert([
                    'service_id' => $serviceData['id'],
                    'bullet_point' => $bulletPoint['bullet_point'],
                    'icon' => $bulletPoint['icon'],
                    'order' => $bulletPoint['order'],
                    'created_at' => $serviceData['created_at'],
                    'updated_at' => $serviceData['updated_at'],
                ]);
            }
        }
    }

    /**
     * Seed FAQs
     */
    private function seedFaqs(): void
    {
        $faqs = [
            ['question' => 'What is Eventex Solution?', 'answer' => 'A professional event management company for corporate, private, and society events.', 'side' => 'left', 'order' => 1],
            ['question' => 'What services do we offer?', 'answer' => 'Event planning, stalls, decor, photography, videography, live streaming, and more.', 'side' => 'left', 'order' => 2],
            ['question' => 'Can you manage both indoor and outdoor events?', 'answer' => 'Yes, we handle events of any size, indoors or outdoors.', 'side' => 'left', 'order' => 3],
            ['question' => 'Do you handle weddings and birthdays?', 'answer' => 'Absolutely, we specialize in weddings, birthdays, and other celebrations.', 'side' => 'left', 'order' => 4],
            ['question' => 'How do I book your services?', 'answer' => 'Contact us via the website or call to schedule a consultation.', 'side' => 'left', 'order' => 5],
            ['question' => 'Can you plan corporate events?', 'answer' => 'Yes, including conferences, meetings, and corporate parties.', 'side' => 'left', 'order' => 6],
            ['question' => 'Do you provide theme-based event planning?', 'answer' => 'Yes, we create customized themes for every event.', 'side' => 'left', 'order' => 7],
            ['question' => 'Can you manage last-minute events?', 'answer' => 'Yes, we specialize in hassle-free and quick setups.', 'side' => 'left', 'order' => 8],
            ['question' => 'Do you handle permits and permissions?', 'answer' => 'Yes, we take care of all necessary event permissions.', 'side' => 'left', 'order' => 9],
            ['question' => 'Do you provide professional photography?', 'answer' => 'Yes, we cover all events with high-quality photography.', 'side' => 'right', 'order' => 10],
            ['question' => 'Do you offer videography services?', 'answer' => 'Yes, including event coverage, highlights, and full-length videos.', 'side' => 'right', 'order' => 11],
            ['question' => 'Can you record drone videos?', 'answer' => 'Yes, we provide aerial shots using drones.', 'side' => 'right', 'order' => 12],
            ['question' => 'How soon will I get photos & videos?', 'answer' => 'Typically within a few days, depending on the event size.', 'side' => 'right', 'order' => 13],
            ['question' => 'Can you make video reels or albums?', 'answer' => 'Yes, professionally edited reels and albums are available.', 'side' => 'right', 'order' => 14],
            ['question' => 'Do you provide live streaming?', 'answer' => 'Yes, for conferences, weddings, and corporate events.', 'side' => 'right', 'order' => 15],
            ['question' => 'How many cameras can you use?', 'answer' => 'Multi-camera setups for dynamic coverage.', 'side' => 'right', 'order' => 16],
            ['question' => 'Can you display the event on big screens?', 'answer' => 'Yes, we provide big screen casting and projection.', 'side' => 'right', 'order' => 17],
            ['question' => 'Do you record the live events?', 'answer' => 'Yes, complete recording for on-demand playback.', 'side' => 'right', 'order' => 18],
            ['question' => 'Do you provide stage decoration?', 'answer' => 'Yes, customized decoration for every event theme.', 'side' => 'left', 'order' => 19],
            ['question' => 'Do you handle sound and lighting?', 'answer' => 'Yes, professional audio and lighting setup included.', 'side' => 'left', 'order' => 20],
            ['question' => 'Can you arrange DJs or live music?', 'answer' => 'Yes, music setup is part of our services.', 'side' => 'left', 'order' => 21],
            ['question' => 'Are your sound setups suitable for large venues?', 'answer' => 'Yes, scalable setups for any venue size.', 'side' => 'left', 'order' => 22],
            ['question' => 'Do you provide event stalls and tents?', 'answer' => 'Yes, custom stalls and tents for exhibitions or fairs.', 'side' => 'right', 'order' => 23],
            ['question' => 'Do you arrange food and snacks?', 'answer' => 'Yes, hygienic catering and snack arrangements available.', 'side' => 'right', 'order' => 24],
            ['question' => 'Can you manage exhibition stalls?', 'answer' => 'Yes, professional setup for corporate and product exhibitions.', 'side' => 'right', 'order' => 25],
            ['question' => 'Do you provide themed tent decoration?', 'answer' => 'Yes, tents can be decorated to match the event theme.', 'side' => 'right', 'order' => 26],
            ['question' => 'How can I get a customized quote?', 'answer' => 'Share your event details via our website or call us directly.', 'side' => 'right', 'order' => 27],
        ];

        $now = Carbon::parse('2026-03-27 06:19:35');
        $order = 1;
        
        foreach ($faqs as $faq) {
            DB::table('faqs')->insert([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'side' => $faq['side'],
                'order' => $order,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $order++;
        }
    }

    /**
     * Seed testimonials
     */
    private function seedTestimonials(): void
    {
        DB::table('testimonials')->insert([
            [
                'id' => 1,
                'name' => 'Ashok Mishra',
                'designation' => 'Client',
                'review_text' => 'We hired Eventex Solution for our company\'s annual conference with a live streaming setup, and I must say, they exceeded all expectations. The multi-camera setup captured every angle perfectly, the audio was crystal clear, and the streaming ran without any interruptions. Their team was professional, punctual, and handled all technical aspects seamlessly. Our remote attendees felt like they were present in the hall, and the recorded videos turned out fantastic for future reference. I highly recommend Eventex Solution for any corporate or large-scale live streaming needs.',
                'rating' => 5,
                'date' => '2026-03-20',
                'image' => '1774612909_69c671ad03d11.png',
                'order' => 1,
                'is_active' => 1,
                'created_at' => Carbon::parse('2026-03-27 06:31:49'),
                'updated_at' => Carbon::parse('2026-03-27 06:31:49'),
            ],
            [
                'id' => 2,
                'name' => 'Rajesh Kumar',
                'designation' => 'Regular Client',
                'review_text' => 'Eventex Solution made our society\'s annual cultural event an absolute success! From the moment we approached them, their team was proactive and creative. They took care of everything – stage and venue decoration, sound setup, photography, and videography. The children\'s performances, community dances, and prize distribution were all perfectly captured. The snacks, tents, and seating arrangements were organized flawlessly, making the event enjoyable for everyone. Thanks to Eventex Solution, the entire society had a memorable, stress-free celebration. We couldn\'t have asked for a better event management partner!',
                'rating' => 5,
                'date' => '2026-03-27',
                'image' => '1774612941_69c671cd87422.png',
                'order' => 2,
                'is_active' => 1,
                'created_at' => Carbon::parse('2026-03-27 06:32:21'),
                'updated_at' => Carbon::parse('2026-03-27 06:32:21'),
            ],
        ]);
    }

    /**
     * Seed Why Us section
     */
    private function seedWhyUs(): void
    {
        DB::table('why_us')->insert([
            'id' => 1,
            'whyus_paragraph' => 'At Eventex Solution, we turn your vision into unforgettable experiences. With expertise in corporate events, weddings, birthdays, society celebrations, stalls, and live streaming, we handle every detail – from planning and décor to photography, videography, and sound. Our multi-camera setups, professional team, and creative approach ensure seamless execution, leaving you stress-free and your guests impressed. We combine innovation, reliability, and personalized service to make every event truly remarkable.',
            'created_at' => Carbon::parse('2026-03-27 06:37:38'),
            'updated_at' => Carbon::parse('2026-03-27 06:37:38'),
        ]);

        $whyUsItems = [
            ['icon' => 'lni lni-video', 'title' => 'Seamless Live Streaming', 'description' => 'Multi-camera setups and crystal-clear audio ensure your events are broadcast flawlessly to remote audiences.'],
            ['icon' => 'lni lni-camera', 'title' => 'Professional Photography', 'description' => 'Capture every moment with high-quality, candid, and creative photography for weddings, parties, and corporate events.'],
            ['icon' => 'lni lni-video', 'title' => 'Expert Videography', 'description' => 'From event highlights to full-length coverage, we create stunning videos that preserve your memories forever.'],
            ['icon' => 'lni lni-star', 'title' => 'Stunning Décor & Perfect Sound', 'description' => 'Transform venues with theme-based decoration and professional audio setups for an immersive event experience.'],
            ['icon' => 'lni lni-home', 'title' => 'Custom Stalls & Comfortable Tents', 'description' => 'Vibrant stalls, exhibition setups, and themed tents make every event organized, attractive, and memorable.'],
            ['icon' => 'lni lni-display', 'title' => 'Big Screen & Live Coverage', 'description' => 'Stream your event live on large screens with real-time coverage and full recording for later playback.'],
        ];

        $now = Carbon::parse('2026-03-27 06:49:32');
        
        foreach ($whyUsItems as $item) {
            DB::table('why_us_items')->insert([
                'why_us_id' => 1,
                'icon' => $item['icon'],
                'title' => $item['title'],
                'description' => $item['description'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}