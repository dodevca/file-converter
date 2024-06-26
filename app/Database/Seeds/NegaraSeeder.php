<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NegaraSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('negara')->insertBatch([
            ['iso' => 'AFG', 'nama' => 'Afghanistan'],
            ['iso' => 'AGO', 'nama' => 'Angola'],
            ['iso' => 'AIA', 'nama' => 'Anguilla'],
            ['iso' => 'ALA', 'nama' => 'Åland Islands'],
            ['iso' => 'ALB', 'nama' => 'Albania'],
            ['iso' => 'AND', 'nama' => 'Andorra'],
            ['iso' => 'ARE', 'nama' => 'United Arab Emirates'],
            ['iso' => 'ARG', 'nama' => 'Argentina'],
            ['iso' => 'ARM', 'nama' => 'Armenia'],
            ['iso' => 'ASM', 'nama' => 'American Samoa'],
            ['iso' => 'ATA', 'nama' => 'Antarctica'],
            ['iso' => 'ATF', 'nama' => 'French Southern Territories'],
            ['iso' => 'ATG', 'nama' => 'Antigua and Barbuda'],
            ['iso' => 'AUS', 'nama' => 'Australia'],
            ['iso' => 'AUT', 'nama' => 'Austria'],
            ['iso' => 'AZE', 'nama' => 'Azerbaijan'],
            ['iso' => 'BDI', 'nama' => 'Burundi'],
            ['iso' => 'BEL', 'nama' => 'Belgium'],
            ['iso' => 'BEN', 'nama' => 'Benin'],
            ['iso' => 'BES', 'nama' => 'Bonaire, Sint Eustatius and Saba'],
            ['iso' => 'BFA', 'nama' => 'Burkina Faso'],
            ['iso' => 'BGD', 'nama' => 'Bangladesh'],
            ['iso' => 'BGR', 'nama' => 'Bulgaria'],
            ['iso' => 'BHR', 'nama' => 'Bahrain'],
            ['iso' => 'BHS', 'nama' => 'Bahamas'],
            ['iso' => 'BIH', 'nama' => 'Bosnia and Herzegovina'],
            ['iso' => 'BLM', 'nama' => 'Saint Barthélemy'],
            ['iso' => 'BLR', 'nama' => 'Belarus'],
            ['iso' => 'BLZ', 'nama' => 'Belize'],
            ['iso' => 'BMU', 'nama' => 'Bermuda'],
            ['iso' => 'BOL', 'nama' => 'Bolivia, Plurinational State of'],
            ['iso' => 'BRA', 'nama' => 'Brazil'],
            ['iso' => 'BRB', 'nama' => 'Barbados'],
            ['iso' => 'BRN', 'nama' => 'Brunei Darussalam'],
            ['iso' => 'BTN', 'nama' => 'Bhutan'],
            ['iso' => 'BVT', 'nama' => 'Bouvet Island'],
            ['iso' => 'BWA', 'nama' => 'Botswana'],
            ['iso' => 'CAF', 'nama' => 'Central African Republic'],
            ['iso' => 'CAN', 'nama' => 'Canada'],
            ['iso' => 'CCK', 'nama' => 'Cocos (Keeling) Islands'],
            ['iso' => 'CHE', 'nama' => 'Switzerland'],
            ['iso' => 'CHL', 'nama' => 'Chile'],
            ['iso' => 'CHN', 'nama' => 'China'],
            ['iso' => 'CIV', 'nama' => 'Côte d\'Ivoire'],
            ['iso' => 'CMR', 'nama' => 'Cameroon'],
            ['iso' => 'COD', 'nama' => 'Congo, the Democratic Republic of the'],
            ['iso' => 'COG', 'nama' => 'Congo'],
            ['iso' => 'COK', 'nama' => 'Cook Islands'],
            ['iso' => 'COL', 'nama' => 'Colombia'],
            ['iso' => 'COM', 'nama' => 'Comoros'],
            ['iso' => 'CPV', 'nama' => 'Cape Verde'],
            ['iso' => 'CRI', 'nama' => 'Costa Rica'],
            ['iso' => 'CUB', 'nama' => 'Cuba'],
            ['iso' => 'CUW', 'nama' => 'Curaçao'],
            ['iso' => 'CXR', 'nama' => 'Christmas Island'],
            ['iso' => 'CYM', 'nama' => 'Cayman Islands'],
            ['iso' => 'CYP', 'nama' => 'Cyprus'],
            ['iso' => 'CZE', 'nama' => 'Czech Republic'],
            ['iso' => 'DEU', 'nama' => 'Germany'],
            ['iso' => 'DJI', 'nama' => 'Djibouti'],
            ['iso' => 'DMA', 'nama' => 'Dominica'],
            ['iso' => 'DNK', 'nama' => 'Denmark'],
            ['iso' => 'DOM', 'nama' => 'Dominican Republic'],
            ['iso' => 'DZA', 'nama' => 'Algeria'],
            ['iso' => 'ECU', 'nama' => 'Ecuador'],
            ['iso' => 'EGY', 'nama' => 'Egypt'],
            ['iso' => 'ERI', 'nama' => 'Eritrea'],
            ['iso' => 'ESH', 'nama' => 'Western Sahara'],
            ['iso' => 'ESP', 'nama' => 'Spain'],
            ['iso' => 'EST', 'nama' => 'Estonia'],
            ['iso' => 'ETH', 'nama' => 'Ethiopia'],
            ['iso' => 'FIN', 'nama' => 'Finland'],
            ['iso' => 'FJI', 'nama' => 'Fiji'],
            ['iso' => 'FLK', 'nama' => 'Falkland Islands (Malvinas)'],
            ['iso' => 'FRA', 'nama' => 'France'],
            ['iso' => 'FRO', 'nama' => 'Faroe Islands'],
            ['iso' => 'FSM', 'nama' => 'Micronesia, Federated States of'],
            ['iso' => 'GAB', 'nama' => 'Gabon'],
            ['iso' => 'GBR', 'nama' => 'United Kingdom'],
            ['iso' => 'GEO', 'nama' => 'Georgia'],
            ['iso' => 'GGY', 'nama' => 'Guernsey'],
            ['iso' => 'GHA', 'nama' => 'Ghana'],
            ['iso' => 'GIB', 'nama' => 'Gibraltar'],
            ['iso' => 'GIN', 'nama' => 'Guinea'],
            ['iso' => 'GLP', 'nama' => 'Guadeloupe'],
            ['iso' => 'GMB', 'nama' => 'Gambia'],
            ['iso' => 'GNB', 'nama' => 'Guinea-Bissau'],
            ['iso' => 'GNQ', 'nama' => 'Equatorial Guinea'],
            ['iso' => 'GRC', 'nama' => 'Greece'],
            ['iso' => 'GRD', 'nama' => 'Grenada'],
            ['iso' => 'GRL', 'nama' => 'Greenland'],
            ['iso' => 'GTM', 'nama' => 'Guatemala'],
            ['iso' => 'GUF', 'nama' => 'French Guiana'],
            ['iso' => 'GUM', 'nama' => 'Guam'],
            ['iso' => 'GUY', 'nama' => 'Guyana'],
            ['iso' => 'HKG', 'nama' => 'Hong Kong'],
            ['iso' => 'HMD', 'nama' => 'Heard Island and McDonald Islands'],
            ['iso' => 'HND', 'nama' => 'Honduras'],
            ['iso' => 'HRV', 'nama' => 'Croatia'],
            ['iso' => 'HTI', 'nama' => 'Haiti'],
            ['iso' => 'HUN', 'nama' => 'Hungary'],
            ['iso' => 'IDN', 'nama' => 'Indonesia'],
            ['iso' => 'IMN', 'nama' => 'Isle of Man'],
            ['iso' => 'IND', 'nama' => 'India'],
            ['iso' => 'IOT', 'nama' => 'British Indian Ocean Territory'],
            ['iso' => 'IRL', 'nama' => 'Ireland'],
            ['iso' => 'IRN', 'nama' => 'Iran, Islamic Republic of'],
            ['iso' => 'IRQ', 'nama' => 'Iraq'],
            ['iso' => 'ISL', 'nama' => 'Iceland'],
            ['iso' => 'ISR', 'nama' => 'Israel'],
            ['iso' => 'ITA', 'nama' => 'Italy'],
            ['iso' => 'JAM', 'nama' => 'Jamaica'],
            ['iso' => 'JEY', 'nama' => 'Jersey'],
            ['iso' => 'JOR', 'nama' => 'Jordan'],
            ['iso' => 'JPN', 'nama' => 'Japan'],
            ['iso' => 'KAZ', 'nama' => 'Kazakhstan'],
            ['iso' => 'KEN', 'nama' => 'Kenya'],
            ['iso' => 'KGZ', 'nama' => 'Kyrgyzstan'],
            ['iso' => 'KHM', 'nama' => 'Cambodia'],
            ['iso' => 'KIR', 'nama' => 'Kiribati'],
            ['iso' => 'KNA', 'nama' => 'Saint Kitts and Nevis'],
            ['iso' => 'KOR', 'nama' => 'Korea, Republic of'],
            ['iso' => 'KWT', 'nama' => 'Kuwait'],
            ['iso' => 'LAO', 'nama' => 'Lao People\'s Democratic Republic'],
            ['iso' => 'LBN', 'nama' => 'Lebanon'],
            ['iso' => 'LBR', 'nama' => 'Liberia'],
            ['iso' => 'LBY', 'nama' => 'Libya'],
            ['iso' => 'LCA', 'nama' => 'Saint Lucia'],
            ['iso' => 'LIE', 'nama' => 'Liechtenstein'],
            ['iso' => 'LKA', 'nama' => 'Sri Lanka'],
            ['iso' => 'LSO', 'nama' => 'Lesotho'],
            ['iso' => 'LTU', 'nama' => 'Lithuania'],
            ['iso' => 'LUX', 'nama' => 'Luxembourg'],
            ['iso' => 'LVA', 'nama' => 'Latvia'],
            ['iso' => 'MAC', 'nama' => 'Macao'],
            ['iso' => 'MAF', 'nama' => 'Saint Martin (French part)'],
            ['iso' => 'MAR', 'nama' => 'Morocco'],
            ['iso' => 'MCO', 'nama' => 'Monaco'],
            ['iso' => 'MDA', 'nama' => 'Moldova, Republic of'],
            ['iso' => 'MDG', 'nama' => 'Madagascar'],
            ['iso' => 'MDV', 'nama' => 'Maldives'],
            ['iso' => 'MEX', 'nama' => 'Mexico'],
            ['iso' => 'MHL', 'nama' => 'Marshall Islands'],
            ['iso' => 'MKD', 'nama' => 'Macedonia, the former Yugoslav Republic of'],
            ['iso' => 'MLI', 'nama' => 'Mali'],
            ['iso' => 'MLT', 'nama' => 'Malta'],
            ['iso' => 'MMR', 'nama' => 'Myanmar'],
            ['iso' => 'MNE', 'nama' => 'Montenegro'],
            ['iso' => 'MNG', 'nama' => 'Mongolia'],
            ['iso' => 'MNP', 'nama' => 'Northern Mariana Islands'],
            ['iso' => 'MOZ', 'nama' => 'Mozambique'],
            ['iso' => 'MRT', 'nama' => 'Mauritania'],
            ['iso' => 'MSR', 'nama' => 'Montserrat'],
            ['iso' => 'MTQ', 'nama' => 'Martinique'],
            ['iso' => 'MUS', 'nama' => 'Mauritius'],
            ['iso' => 'MWI', 'nama' => 'Malawi'],
            ['iso' => 'MYS', 'nama' => 'Malaysia'],
            ['iso' => 'MYT', 'nama' => 'Mayotte'],
            ['iso' => 'NAM', 'nama' => 'Namibia'],
            ['iso' => 'NCL', 'nama' => 'New Caledonia'],
            ['iso' => 'NER', 'nama' => 'Niger'],
            ['iso' => 'NFK', 'nama' => 'Norfolk Island'],
            ['iso' => 'NGA', 'nama' => 'Nigeria'],
            ['iso' => 'NIC', 'nama' => 'Nicaragua'],
            ['iso' => 'NIU', 'nama' => 'Niue'],
            ['iso' => 'NLD', 'nama' => 'Netherlands'],
            ['iso' => 'NOR', 'nama' => 'Norway'],
            ['iso' => 'NPL', 'nama' => 'Nepal'],
            ['iso' => 'NRU', 'nama' => 'Nauru'],
            ['iso' => 'NZL', 'nama' => 'New Zealand'],
            ['iso' => 'OMN', 'nama' => 'Oman'],
            ['iso' => 'PAK', 'nama' => 'Pakistan'],
            ['iso' => 'PAN', 'nama' => 'Panama'],
            ['iso' => 'PCN', 'nama' => 'Pitcairn'],
            ['iso' => 'PER', 'nama' => 'Peru'],
            ['iso' => 'PHL', 'nama' => 'Philippines'],
            ['iso' => 'PLW', 'nama' => 'Palau'],
            ['iso' => 'PNG', 'nama' => 'Papua New Guinea'],
            ['iso' => 'POL', 'nama' => 'Poland'],
            ['iso' => 'PRI', 'nama' => 'Puerto Rico'],
            ['iso' => 'PRK', 'nama' => "Korea, Democratic People\'s Republic of"],
            ['iso' => 'PRT', 'nama' => 'Portugal'],
            ['iso' => 'PRY', 'nama' => 'Paraguay'],
            ['iso' => 'PSE', 'nama' => 'Palestinian Territory, Occupied'],
            ['iso' => 'PYF', 'nama' => 'French Polynesia'],
            ['iso' => 'QAT', 'nama' => 'Qatar'],
            ['iso' => 'REU', 'nama' => 'Réunion'],
            ['iso' => 'ROU', 'nama' => 'Romania'],
            ['iso' => 'RUS', 'nama' => 'Russian Federation'],
            ['iso' => 'RWA', 'nama' => 'Rwanda'],
            ['iso' => 'SAU', 'nama' => 'Saudi Arabia'],
            ['iso' => 'SDN', 'nama' => 'Sudan'],
            ['iso' => 'SEN', 'nama' => 'Senegal'],
            ['iso' => 'SGP', 'nama' => 'Singapore'],
            ['iso' => 'SGS', 'nama' => 'South Georgia and the South Sandwich Islands'],
            ['iso' => 'SHN', 'nama' => 'Saint Helena, Ascension and Tristan da Cunha'],
            ['iso' => 'SJM', 'nama' => 'Svalbard and Jan Mayen'],
            ['iso' => 'SLB', 'nama' => 'Solomon Islands'],
            ['iso' => 'SLE', 'nama' => 'Sierra Leone'],
            ['iso' => 'SLV', 'nama' => 'El Salvador'],
            ['iso' => 'SMR', 'nama' => 'San Marino'],
            ['iso' => 'SOM', 'nama' => 'Somalia'],
            ['iso' => 'SPM', 'nama' => 'Saint Pierre and Miquelon'],
            ['iso' => 'SRB', 'nama' => 'Serbia'],
            ['iso' => 'SSD', 'nama' => 'South Sudan'],
            ['iso' => 'STP', 'nama' => 'Sao Tome and Principe'],
            ['iso' => 'SUR', 'nama' => 'Suriname'],
            ['iso' => 'SVK', 'nama' => 'Slovakia'],
            ['iso' => 'SVN', 'nama' => 'Slovenia'],
            ['iso' => 'SWE', 'nama' => 'Sweden'],
            ['iso' => 'SWZ', 'nama' => 'Swaziland'],
            ['iso' => 'SXM', 'nama' => 'Sint Maarten (Dutch part)'],
            ['iso' => 'SYC', 'nama' => 'Seychelles'],
            ['iso' => 'SYR', 'nama' => 'Syrian Arab Republic'],
            ['iso' => 'TCA', 'nama' => 'Turks and Caicos Islands'],
            ['iso' => 'TCD', 'nama' => 'Chad'],
            ['iso' => 'TGO', 'nama' => 'Togo'],
            ['iso' => 'THA', 'nama' => 'Thailand'],
            ['iso' => 'TJK', 'nama' => 'Tajikistan'],
            ['iso' => 'TKL', 'nama' => 'Tokelau'],
            ['iso' => 'TKM', 'nama' => 'Turkmenistan'],
            ['iso' => 'TLS', 'nama' => 'Timor-Leste'],
            ['iso' => 'TON', 'nama' => 'Tonga'],
            ['iso' => 'TTO', 'nama' => 'Trinidad and Tobago'],
            ['iso' => 'TUN', 'nama' => 'Tunisia'],
            ['iso' => 'TUR', 'nama' => 'Turkey'],
            ['iso' => 'TUV', 'nama' => 'Tuvalu'],
            ['iso' => 'TWN', 'nama' => 'Taiwan, Province of China'],
            ['iso' => 'TZA', 'nama' => 'Tanzania, United Republic of'],
            ['iso' => 'UGA', 'nama' => 'Uganda'],
            ['iso' => 'UKR', 'nama' => 'Ukraine'],
            ['iso' => 'UMI', 'nama' => 'United States Minor Outlying Islands'],
            ['iso' => 'URY', 'nama' => 'Uruguay'],
            ['iso' => 'USA', 'nama' => 'United States'],
            ['iso' => 'UZB', 'nama' => 'Uzbekistan'],
            ['iso' => 'VAT', 'nama' => 'Holy See (Vatican City State)'],
            ['iso' => 'VCT', 'nama' => 'Saint Vincent and the Grenadines'],
            ['iso' => 'VEN', 'nama' => 'Venezuela, Bolivarian Republic of'],
            ['iso' => 'VGB', 'nama' => 'Virgin Islands, British'],
            ['iso' => 'VIR', 'nama' => 'Virgin Islands, U.S.'],
            ['iso' => 'VNM', 'nama' => 'Vietnam'],
            ['iso' => 'VUT', 'nama' => 'Vanuatu'],
            ['iso' => 'WLF', 'nama' => 'Wallis and Futuna'],
            ['iso' => 'WSM', 'nama' => 'Samoa'],
            ['iso' => 'YEM', 'nama' => 'Yemen'],
            ['iso' => 'ZAF', 'nama' => 'South Africa'],
            ['iso' => 'ZMB', 'nama' => 'Zambia'],
            ['iso' => 'ZWE', 'nama' => 'Zimbabwe'],
        ]);
    }
}
