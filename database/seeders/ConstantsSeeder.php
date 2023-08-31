<?php

namespace Database\Seeders;

use App\Models\CONST_Country;
use App\Models\CONST_facility_staff_type;
use App\Models\CONST_Facility_type;
use App\Models\CONST_Patient_Category;
use App\Models\CONST_User_Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::unprepared("
        TRUNCATE TABLE const_system_language;
        ");
        DB::unprepared(
            "
            INSERT INTO const_system_language (`language_name_en`,`language_name_ar`, `language_abbr_en`, `language_name_og`) VALUES
            ('English', 'الإنجليزية', 'en', 'English'),
            ('Arabic', 'العربية', 'ar', 'العربية');
            "
        );

        DB::unprepared("
        TRUNCATE TABLE const_doctor_specialties;
        ");
        DB::unprepared(
            "
INSERT INTO `const_doctor_specialties` (`id`, `name`) VALUES
	(1, 'Anaesthesiologist'),
	(2, 'Cardiologist'),
	(3, 'Dentist'),
	(4, 'Dermatologist');
           "
        );

        CONST_User_Type::truncate();
        (new CONST_User_Type())->setTranslation('name', 'en', 'Patient')->setTranslation('name', 'ar', 'مريض')->setModelType('App\Models\Patient')->save();
        (new CONST_User_Type())->setTranslation('name', 'en', 'Doctor')->setTranslation('name', 'ar', 'طبيب')->setModelType('App\Models\Doctor')->save();
        (new CONST_User_Type())->setTranslation('name', 'en', 'Lab Technician')->setTranslation('name', 'ar', 'اخصائي مختبر')->setModelType('')->save();
        (new CONST_User_Type())->setTranslation('name', 'en', 'Pharmacist')->setTranslation('name', 'ar', 'صيدلي')->setModelType('')->save();
        (new CONST_User_Type())->setTranslation('name', 'en', 'Facility Administrator')->setTranslation('name', 'ar', 'مدير مؤسسة')->setModelType('App\Models\FacilityAdministrator')->save();
        (new CONST_User_Type())->setTranslation('name', 'en', 'Country Administrator')->setTranslation('name', 'ar', 'مدير دولة')->setModelType('')->save();
        (new CONST_User_Type())->setTranslation('name', 'en', 'System Administrator')->setTranslation('name', 'ar', 'مدير نظام')->setModelType('')->save();
        (new CONST_User_Type())->setTranslation('name', 'en', 'facility_staff')->setTranslation('name', 'ar', 'موظف')->setModelType('App\Models\FacilityStaff')->save();

        CONST_Patient_Category::truncate();
        (new CONST_Patient_Category())->setTranslation('name', 'en', 'normal')->setTranslation('name', 'ar', 'مريض')->save();
        (new CONST_Patient_Category())->setTranslation('name', 'en', 'Student')->setTranslation('name', 'ar', 'طالب')->save();
        (new CONST_Patient_Category())->setTranslation('name', 'en', 'Parent')->setTranslation('name', 'ar', 'ولي أمر')->save();

        CONST_Facility_type::truncate();
        (new CONST_Facility_type())->setTranslation('name', 'en', 'Hospital')->setTranslation('name', 'ar', 'مشفى')->save();
        (new CONST_Facility_type())->setTranslation('name', 'en', 'Clinic')->setTranslation('name', 'ar', 'عيادة')->save();
        (new CONST_Facility_type())->setTranslation('name', 'en', 'School')->setTranslation('name', 'ar', 'مدرسة')->save();


        CONST_facility_staff_type::truncate();
        (new CONST_facility_staff_type())->setTranslation('name', 'en', 'Nurse')->setTranslation('name', 'ar', 'ممرض')->save();
        (new CONST_facility_staff_type())->setTranslation('name', 'en', 'Reception')->setTranslation('name', 'ar', 'إستقبال')->save();
        


        CONST_Country::truncate();
        DB::unprepared("
        INSERT INTO `const_countries` (`CountryCode`, `name`, `NationalExpatriate`, `FourGroups`, `SixGroups`, `NineGroups`, `FourteenGroups`, `UN`, `IsDeleted`, `R4AnswerID`, `iso`, `phonecode`, `TimeZoneName`) VALUES
         ('Afghan', 'Afghanistan', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'AF', 93, 'Asia/Kabul'),
    ('Albanian', 'Albania', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'AL', 355, 'Europe/Tirane'),
    ('Algerian', 'Algeria', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'DZ', 213, 'Africa/Algiers'),
    ('American', 'United States Of America', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'US', 1, NULL),
    ('Andorran', 'Andorra', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'AD', 376, 'Europe/Andorra'),
    ('Angolan', 'Angola', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'AO', 244, 'Africa/Luanda'),
    ('Antiguan', 'Antigua And Barbuda', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'AG', 1268, NULL),
    ('Argentine', 'Argentina', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'AR', 54, 'America/Argentina/Buenos_Aires'),
    ('Armenian', 'Armenia', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Asia', 0, NULL, 'AM', 374, 'Asia/Yerevan'),
    ('Australian', 'Australia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'AU', 61, 'Antarctica/Macquarie'),
    ('Austrian', 'Austria', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'AT', 43, 'Europe/Vienna'),
    ('Azerbaijani', 'Azerbaijan', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Asia', 0, NULL, 'AZ', 994, 'Asia/Baku'),
    ('Bahamian', 'Bahamas', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'BS', 1242, 'America/Nassau'),
    ('Bahraini', 'Bahrain', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Asia', 0, NULL, 'BH', 973, 'Asia/Bahrain'),
    ('Bangladeshi', 'Bangladesh', 'Expatriate', 'Rest of World', 'Rest of World', 'Bangladesh', 'Bangladesh', 'Asia', 0, NULL, 'BD', 880, 'Asia/Dhaka'),
    ('Barbadian', 'Barbados', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'BB', 1246, 'America/Barbados'),
    ('Basotho', 'Lesotho', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'LS', 266, 'Africa/Maseru'),
    ('Belarusian', 'Belarus', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'BY', 375, 'Europe/Minsk'),
    ('Belgian', 'Belgium', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'BE', 32, 'Europe/Brussels'),
    ('Belizean', 'Belize', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'BZ', 501, 'America/Belize'),
    ('Beninese', 'Benin', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'BJ', 229, 'Africa/Porto-Novo'),
    ('Bhutanese', 'Bhutan', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'BT', 975, 'Asia/Thimphu'),
    ('Bolivian', 'Bolivia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'BO', 591, NULL),
    ('Bosnian', 'Bosnia And Herzegovina', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'BA', 387, NULL),
    ('Brazilian', 'Brazil', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'BR', 55, 'America/Araguaina'),
    ('British', 'United Kingdom', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'GB', 44, 'Europe/London'),
    ('Bruneian', 'Brunei Darussalam', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'BR', NULL, 'Asia/Brunei'),
    ('Bulgarian', 'Bulgaria', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'BG', 359, 'Europe/Sofia'),
    ('Burkinabe', 'Burkina Faso', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'BF', 226, 'Africa/Ouagadougou'),
    ('Burundian', 'Burundi', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'BI', 257, 'Africa/Bujumbura'),
    ('Cambodian', 'Cambodia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'KH', 855, 'Asia/Phnom_Penh'),
    ('Cameroonian', 'Cameroon', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'CM', 237, 'Africa/Douala'),
    ('Canadian', 'Canada', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'CA', 1, 'America/Atikokan'),
    ('Cape Verdean', 'Cape Verde', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'CV', 238, 'Atlantic/Cape_Verde'),
    ('Central African', 'Central African Republic', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'CF', 236, 'Africa/Bangui'),
    ('Chadian', 'Chad', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'TD', 235, 'Africa/Ndjamena'),
    ('Chilean', 'Chile', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'CL', 56, 'America/Punta_Arenas'),
    ('Chinese', 'China', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'CN', 86, 'Asia/Shanghai'),
    ('Colombian', 'Colombia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'CO', 57, 'America/Bogota'),
    ('Comoran', 'Comoros', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'KM', 269, 'Indian/Comoro'),
    ('Congolese', 'Democratic Republic Of The Congo', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'CG', 242, NULL),
    ('Cook Islander', 'Cook Islands', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'CK', 682, 'Pacific/Rarotonga'),
    ('Costa Rican', 'Costa Rica', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'CR', 506, 'America/Costa_Rica'),
    ('Croatian', 'Croatia', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'HR', 385, 'Europe/Zagreb'),
    ('Cuban', 'Cuba', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'CU', 53, 'America/Havana'),
    ('Cypriot', 'Cyprus', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Asia', 0, NULL, 'CY', 357, 'Asia/Famagusta'),
    ('Czech', 'Czech Republic', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'CZ', 420, 'Europe/Prague'),
    ('Danish', 'Denmark', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'DK', 45, 'Europe/Copenhagen'),
    ('Djiboutian', 'Djibouti', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'DJ', 253, 'Africa/Djibouti'),
    ('Dominican', 'Dominica Dominican Republic', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'DO', 1809, NULL),
    ('Dutch', 'Netherlands', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'NL', 31, 'Europe/Amsterdam'),
    ('Ecuadorian', 'Ecuador', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'EC', 593, 'America/Guayaquil'),
    ('Egyptian', 'Egypt', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'EG', 20, 'Africa/Cairo'),
    ('Emirati', 'United Arab Emirates', 'National', 'National', 'National', 'National', 'National', 'Asia', 0, NULL, 'AE', 971, 'Asia/Dubai'),
    ('Equatoguinean', 'Equatorial Guinea', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'GQ', 240, 'Africa/Malabo'),
    ('Eritrean', 'Eritrea', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'ER', 291, 'Africa/Asmara'),
    ('Estonian', 'Estonia', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'EE', 372, 'Europe/Tallinn'),
    ('Ethiopian', 'Ethiopia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'ET', 251, 'Africa/Addis_Ababa'),
    ('Finnish', 'Finland', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'FI', 358, 'Europe/Helsinki'),
    ('French', 'France', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'FR', 33, 'Europe/Paris'),
    ('Gabonese', 'Gabon', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'GA', 241, 'Africa/Libreville'),
    ('Gambian', 'Gambia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'GM', 220, 'Africa/Banjul'),
    ('Georgian', 'Georgia', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Asia', 0, NULL, 'GE', 995, 'Asia/Tbilisi'),
    ('German', 'Germany', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'DE', 49, 'Europe/Berlin'),
    ('Ghanaian', 'Ghana', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'GH', 233, 'Africa/Accra'),
    ('Greek', 'Greece', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'GR', 30, 'Europe/Athens'),
    ('Grenadian', 'Grenada', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'GD', 1473, 'America/Grenada'),
    ('Guatemalan', 'Guatemala', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'GT', 502, 'America/Guatemala'),
    ('Guinean', 'Guinea, Guinea-bissau', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'GW', 245, NULL),
    ('Guyanese', 'Guyana', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'GY', 592, 'America/Guyana'),
    ('Haitian', 'Haiti', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'HT', 509, 'America/Port-au-Prince'),
    ('Honduran', 'Honduras', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'HN', 504, 'America/Tegucigalpa'),
    ('Hungarian', 'Hungary', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'HU', 36, 'Europe/Budapest'),
    ('Icelandic', 'Iceland', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'IS', 354, 'Atlantic/Reykjavik'),
    ('I-Kiribati', 'Kiribati', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'KI', 686, 'Pacific/Enderbury'),
    ('Indian', 'India', 'Expatriate', 'Indian', 'Indian', 'Indian', 'Indian', 'Asia', 0, NULL, 'IN', 91, 'Asia/Kolkata'),
    ('Indonesian', 'Indonesia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'ID', 62, 'Asia/Jakarta'),
    ('Iranian', 'Iran', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'IR', 98, 'Asia/Tehran'),
    ('Iraqi', 'Iraq', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Asia', 0, NULL, 'IQ', 964, 'Asia/Baghdad'),
    ('Irish', 'Ireland', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'IE', 353, 'Europe/Dublin'),
    ('Israeli', 'Israel', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'IL', 972, 'Asia/Jerusalem'),
    ('Italian', 'Italy', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'IT', 39, 'Europe/Rome'),
    ('Ivorian', 'Côte D\'ivoire', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'CI', 225, NULL),
    ('Jamaican', 'Jamaica', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'JM', 1876, 'America/Jamaica'),
    ('Japanese', 'Japan', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'JP', 81, 'Asia/Tokyo'),
    ('Jordanian', 'Jordan', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Jordan', 'Asia', 0, NULL, 'JO', 962, 'Asia/Amman'),
    ('Kazakhstani', 'Kazakhstan', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Asia', 0, NULL, 'KZ', 7, 'Asia/Almaty'),
    ('Kenyan', 'Kenya', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'KE', 254, 'Africa/Nairobi'),
    ('Kittitian', 'Saint Kitts And Nevis', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'KN', 1869, NULL),
    ('Korean', 'Republic Of Korea, Dprk', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'KP', 850, NULL),
    ('Kuwaiti', 'Kuwait', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Asia', 0, NULL, 'KW', 965, 'Asia/Kuwait'),
    ('Kyrgyzstani', 'Kyrgyzstan', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'KG', 996, 'Asia/Bishkek'),
    ('Laotian', 'Lao People\'s Democratic Republic', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'LA', 856, 'Asia/Vientiane'),
    ('Latvian', 'Latvia', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'LV', 371, 'Europe/Riga'),
    ('Lebanese', 'Lebanon', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Lebanon', 'Asia', 0, NULL, 'LB', 961, 'Asia/Beirut'),
    ('Liberian', 'Liberia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'LR', 231, 'Africa/Monrovia'),
    ('Libyan', 'Libyan Arab Jamahiriya', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'LY', 218, NULL),
    ('Lithuanian', 'Lithuania', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'LT', 370, 'Europe/Vilnius'),
    ('Luxembourg', 'Luxembourg', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'LU', 352, 'Europe/Luxembourg'),
    ('Macedonian', 'Republic Of Macedonia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Europe', 0, NULL, 'MK', 389, NULL),
    ('Malagasy', 'Madagascar', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'MG', 261, 'Indian/Antananarivo'),
    ('Malawian', 'Malawi', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'MW', 265, 'Africa/Blantyre'),
    ('Malaysian', 'Malaysia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'MY', 60, 'Asia/Kuala_Lumpur'),
    ('Maldivian', 'Maldives', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'MV', 960, 'Indian/Maldives'),
    ('Malian', 'Mali', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'ML', 223, 'Africa/Bamako'),
    ('Maltese', 'Malta', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'MT', 356, 'Europe/Malta'),
    ('Marshallese', 'Marshall Islands', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'MH', 692, 'Pacific/Kwajalein'),
    ('Mauritanian', 'Mauritania', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'MR', 222, 'Africa/Nouakchott'),
    ('Mauritian', 'Mauritius', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'MU', 230, 'Indian/Mauritius'),
    ('Mexican', 'Mexico', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'MX', 52, 'America/Bahia_Banderas'),
    ('Micronesian', 'Micronesia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'FM', 691, NULL),
    ('Moldovan', 'Republic Of Moldova', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Europe', 0, NULL, 'MD', 373, NULL),
    ('Monegasque', 'Monaco', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'MC', 377, 'Europe/Monaco'),
    ('Mongolian', 'Mongolia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'MN', 976, 'Asia/Choibalsan'),
    ('Montenegrin', 'Montenegro', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'ME', NULL, 'Europe/Podgorica'),
    ('Moroccan', 'Morocco', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'MA', 212, 'Africa/Casablanca'),
    ('Motswana', 'Botswana', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'BW', 267, 'Africa/Gaborone'),
    ('Mozambican', 'Mozambique', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'MZ', 258, 'Africa/Maputo'),
    ('Myanmarese', 'Myanmar', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'MM', 95, 'Asia/Yangon'),
    ('Namibian', 'Namibia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'NA', 264, 'Africa/Windhoek'),
    ('Nauruan', 'Nauru', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'NR', 674, 'Pacific/Nauru'),
    ('Nepalese', 'Nepal', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'NP', 977, 'Asia/Kathmandu'),
    ('New Zealand', 'New Zealand', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'NZ', 64, 'Pacific/Auckland'),
    ('Nicaraguan', 'Nicaragua', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'NI', 505, 'America/Managua'),
    ('Nigerian', 'Nigeria', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'NG', 234, 'Africa/Lagos'),
    ('Nigerien', 'Niger', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'NE', 227, 'Africa/Niamey'),
    ('Niuean', 'Niue', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'NU', 683, 'Pacific/Niue'),
    ('Ni-Vanuatu', 'Vanuatu', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'VU', 678, 'Pacific/Efate'),
    ('Norwegian', 'Norway', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'NO', 47, 'Europe/Oslo'),
    ('Omani', 'Oman', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Asia', 0, NULL, 'OM', 968, 'Asia/Muscat'),
    ('Pakistani', 'Pakistan', 'Expatriate', 'Rest of World', 'Pakistan', 'Pakistan', 'Pakistan', 'Asia', 0, NULL, 'PK', 92, 'Asia/Karachi'),
    ('Palauan', 'Palau', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'PW', 680, 'Pacific/Palau'),
    ('Palestinian', 'Palestine', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Asia', 0, NULL, 'PS', 970, NULL),
    ('Panamanian', 'Panama', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'PA', 507, 'America/Panama'),
    ('Papua New Guinean', 'Papua New Guinea', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'PG', 675, 'Pacific/Bougainville'),
    ('Paraguayan', 'Paraguay', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'PY', 595, 'America/Asuncion'),
    ('Peruvian', 'Peru', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'PE', 51, 'America/Lima'),
    ('Philippine', 'Philippines', 'Expatriate', 'Rest of World', 'Philippines', 'Philippines', 'Philippines', 'Asia', 0, NULL, 'PH', 63, 'Asia/Manila'),
    ('Polish', 'Poland', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'PL', 48, 'Europe/Warsaw'),
    ('Portuguese', 'Portugal', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'PT', 351, 'Atlantic/Azores'),
    ('Qatari', 'Qatar', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Asia', 0, NULL, 'QA', 974, 'Asia/Qatar'),
    ('Romanian', 'Romania', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'RO', 40, 'Europe/Bucharest'),
    ('Russian', 'Russian Federation', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'RU', 70, 'Asia/Anadyr'),
    ('Rwandan', 'Rwanda', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'RW', 250, 'Africa/Kigali'),
    ('Sahrawian', 'Western Sahara', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'EH', 212, 'Africa/El_Aaiun'),
    ('Saint Lucian', 'Saint Lucia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'LC', 1758, 'America/St_Lucia'),
    ('Salvadoran', 'El Salvador', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'SV', 503, 'America/El_Salvador'),
    ('Sammarinese', 'San Marino', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'SM', 378, 'Europe/San_Marino'),
    ('Samoan', 'Samoa', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'WS', 684, 'Pacific/Apia'),
    ('Sao Tomean', 'Sao Tome And Principe', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'ST', 239, NULL),
    ('Saudi', 'Saudi Arabia', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Asia', 0, NULL, 'SA', 966, 'Asia/Riyadh'),
    ('Senegalese', 'Senegal', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'SE', 46, 'Africa/Dakar'),
    ('Serbian', 'Serbia', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'RS', NULL, 'Europe/Belgrade'),
    ('Seychellois', 'Seychelles', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'SC', 248, 'Indian/Mahe'),
    ('Sierra Leonean', 'Sierra Leone', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'SL', 232, 'Africa/Freetown'),
    ('Singapore', 'Singapore', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'SG', 65, 'Asia/Singapore'),
    ('Slovak', 'Slovakia', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'SK', 421, 'Europe/Bratislava'),
    ('Slovenian', 'Slovenia', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'SI', 386, 'Europe/Ljubljana'),
    ('Solomon Islander', 'Solomon Islands', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'SB', 677, 'Pacific/Guadalcanal'),
    ('Somali', 'Somalia', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'SO', 252, 'Africa/Mogadishu'),
    ('South African', 'South Africa', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'ZA', 27, 'Africa/Johannesburg'),
    ('Spanish', 'Spain', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'ES', 34, 'Africa/Ceuta'),
    ('Sri Lankan', 'Sri Lanka', 'Expatriate', 'Rest of World', 'Rest of World', 'Sri Lanka', 'Sri Lanka', 'Asia', 0, NULL, 'LK', 94, 'Asia/Colombo'),
    ('Sudanese', 'Sudan', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'SD', 249, 'Africa/Khartoum'),
    ('Surinamese', 'Suriname', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'SR', 597, 'America/Paramaribo'),
    ('Swazi', 'Swaziland', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'SZ', 268, 'Africa/Mbabane'),
    ('Swedish', 'Sweden', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'SE', NULL, 'Europe/Stockholm'),
    ('Swiss', 'Switzerland', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'CH', 41, 'Europe/Zurich'),
    ('Syrian', 'Syrian Arab Republic', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Syria', 'Asia', 0, NULL, 'SY', 963, 'Asia/Damascus'),
    ('Tajikistani', 'Tajikistan', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'TJ', 992, 'Asia/Dushanbe'),
    ('Tanzanian', 'United Republic Of Tanzania', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'TZ', 255, NULL),
    ('Thai', 'Thailand', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'TH', 66, 'Asia/Bangkok'),
    ('Timorese', 'Timor-leste', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'TL', 670, NULL),
    ('Togolese', 'Togo', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'TG', 228, 'Africa/Lome'),
    ('Tongan', 'Tonga', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'TO', 676, 'Pacific/Tongatapu'),
    ('Trinidadian', 'Trinidad And Tobago', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'TT', 1868, NULL),
    ('Tunisian', 'Tunisia', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Africa', 0, NULL, 'TN', 216, 'Africa/Tunis'),
    ('Turkish', 'Turkey', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Asia', 0, NULL, 'TR', 90, 'Europe/Istanbul'),
    ('Turkmen', 'Turkmenistan', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'TM', 7370, 'Asia/Ashgabat'),
    ('Tuvaluan', 'Tuvalu', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Oceania', 0, NULL, 'TV', 688, 'Pacific/Funafuti'),
    ('Ugandan', 'Uganda', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'UG', 256, 'Africa/Kampala'),
    ('Ukrainian', 'Ukraine', 'Expatriate', 'Rest of World', 'Rest of World', 'Europe', 'Europe', 'Europe', 0, NULL, 'UA', 380, 'Europe/Kiev'),
    ('Uruguayan', 'Uruguay', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'UY', 598, 'America/Montevideo'),
    ('Uzbek', 'Uzbekistan', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'UZ', 998, 'Asia/Samarkand'),
    ('Venezuelan', 'Venezuela', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'VE', 58, NULL),
    ('Vietnamese', 'Viet Nam', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Asia', 0, NULL, 'VN', 84, 'Asia/Ho_Chi_Minh'),
    ('Vincentian', 'Saint Vincent And The Grenadines', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Rest of World', 'Americas', 0, NULL, 'VC', 1784, NULL),
    ('Yemeni', 'Yemen', 'Expatriate', 'Arab', 'Arab', 'Arab', 'Rest of Arab World', 'Asia', 0, NULL, 'YE', 967, 'Asia/Aden'),
    ('Zambian', 'Zambia', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'ZM', 260, 'Africa/Lusaka'),
    ('Zimbabwean', 'Zimbabwe', 'Expatriate', 'Rest of World', 'Rest of World', 'Rest of World', 'Africa', 'Africa', 0, NULL, 'ZW', 263, 'Africa/Harare');
        ");
    }
}
