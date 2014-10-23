<?php

class DrexCartFunctions {
	
	
	public function getStatesList() {
		return array('AL'=>'Alabama',
				'AK'=>'Alaska',
				'AS'=>'American samoa',
				'AZ'=>'Arizona',
				'AR'=>'Arkansas',
				'CA'=>'California',
				'CO'=>'Colorado',
				'CT'=>'Connecticut',
				'DE'=>'Delaware',
				'DC'=>'District of columbia',
				'FM'=>'Federated states of micronesia',
				'FL'=>'Florida',
				'GA'=>'Georgia',
				'GU'=>'Guam',
				'HI'=>'Hawaii',
				'ID'=>'Idaho',
				'IL'=>'Illinois',
				'IN'=>'Indiana',
				'IA'=>'Iowa',
				'KS'=>'Kansas',
				'KY'=>'Kentucky',
				'LA'=>'Louisiana',
				'ME'=>'Maine',
				'MH'=>'Marshall islands',
				'MD'=>'Maryland',
				'MA'=>'Massachusetts',
				'MI'=>'Michigan',
				'MN'=>'Minnesota',
				'MS'=>'Mississippi',
				'MO'=>'Missouri',
				'MT'=>'Montana',
				'NE'=>'Nebraska',
				'NV'=>'Nevada',
				'NH'=>'New hampshire',
				'NJ'=>'New jersey',
				'NM'=>'New mexico',
				'NY'=>'New york',
				'NC'=>'North carolina',
				'ND'=>'North dakota',
				'MP'=>'Northern mariana islands',
				'OH'=>'Ohio',
				'OK'=>'Oklahoma',
				'OR'=>'Oregon',
				'PW'=>'Palau',
				'PA'=>'Pennsylvania',
				'PR'=>'Puerto rico',
				'RI'=>'Rhode island',
				'SC'=>'South carolina',
				'SD'=>'South dakota',
				'TN'=>'Tennessee',
				'TX'=>'Texas',
				'UT'=>'Utah',
				'VT'=>'Vermont',
				'VI'=>'Virgin islands',
				'VA'=>'Virginia',
				'WA'=>'Washington',
				'WV'=>'West virginia',
				'WI'=>'Wisconsin',
				'WY'=>'Wyoming');
	}
	
	public function formatAddress($address=null) {
		if (!$address) return '<p class="text-center text-danger"><b>No address found</b></p>';
		
		$html = '<address>
				  <strong>'.$address['DrexCartAddress']['firstname'] . ' ' . $address['DrexCartAddress']['lastname'] . '</strong><br>
				  '.$address['DrexCartAddress']['address1'].'<br>
				  '.($address['DrexCartAddress']['address2'] ? $address['DrexCartAddress']['address2'].'<br />' : '').'
				  '.$address['DrexCartAddress']['city'].', '.$address['DrexCartAddress']['state'].' '.$address['DrexCartAddress']['zip'].'<br>
				  '.($address['DrexCartAddress']['contact_number'] ? '<abbr title="Phone">P:</abbr> '.$this->formatPhoneNumber($address['DrexCartAddress']['contact_number']) : '') .'
				</address>';
		return $html;
	}
	
	public function formatPhoneNumber($number = null) {
		$new_number = preg_replace('/\(\)\{\}\-\ \./', '', $number);
		if (strlen($new_number)==10) {
			return substr($new_number, 0,3) . '-'.substr($new_number, 3,3).'-'.substr($new_number, 6);
		} else return $number;
	}
	
}