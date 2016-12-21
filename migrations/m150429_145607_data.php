<?php

class m150429_145607_data extends EDbMigration {

    public function up() {
        
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
           $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
           $options = '';
        }
        
        // Data for table 'Country'
        $this->insert("Country", array(
            "id"=>"1",
            "code"=>"AF",
            "namecap"=>"AFGHANISTAN",
            "name"=>"Afghanistan",
            "iso3"=>"AFG",
            "numcode"=>"4",
        ) );

        $this->insert("Country", array(
            "id"=>"2",
            "code"=>"AL",
            "namecap"=>"ALBANIA",
            "name"=>"Albania",
            "iso3"=>"ALB",
            "numcode"=>"8",
        ) );

        $this->insert("Country", array(
            "id"=>"3",
            "code"=>"DZ",
            "namecap"=>"ALGERIA",
            "name"=>"Algeria",
            "iso3"=>"DZA",
            "numcode"=>"12",
        ) );

        $this->insert("Country", array(
            "id"=>"4",
            "code"=>"AS",
            "namecap"=>"AMERICAN SAMOA",
            "name"=>"American Samoa",
            "iso3"=>"ASM",
            "numcode"=>"16",
        ) );

        $this->insert("Country", array(
            "id"=>"5",
            "code"=>"AD",
            "namecap"=>"ANDORRA",
            "name"=>"Andorra",
            "iso3"=>"AND",
            "numcode"=>"20",
        ) );

        $this->insert("Country", array(
            "id"=>"6",
            "code"=>"AO",
            "namecap"=>"ANGOLA",
            "name"=>"Angola",
            "iso3"=>"AGO",
            "numcode"=>"24",
        ) );

        $this->insert("Country", array(
            "id"=>"7",
            "code"=>"AI",
            "namecap"=>"ANGUILLA",
            "name"=>"Anguilla",
            "iso3"=>"AIA",
            "numcode"=>"660",
        ) );

        $this->insert("Country", array(
            "id"=>"8",
            "code"=>"AQ",
            "namecap"=>"ANTARCTICA",
            "name"=>"Antarctica",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"9",
            "code"=>"AG",
            "namecap"=>"ANTIGUA AND BARBUDA",
            "name"=>"Antigua and Barbuda",
            "iso3"=>"ATG",
            "numcode"=>"28",
        ) );

        $this->insert("Country", array(
            "id"=>"10",
            "code"=>"AR",
            "namecap"=>"ARGENTINA",
            "name"=>"Argentina",
            "iso3"=>"ARG",
            "numcode"=>"32",
        ) );

        $this->insert("Country", array(
            "id"=>"11",
            "code"=>"AM",
            "namecap"=>"ARMENIA",
            "name"=>"Armenia",
            "iso3"=>"ARM",
            "numcode"=>"51",
        ) );

        $this->insert("Country", array(
            "id"=>"12",
            "code"=>"AW",
            "namecap"=>"ARUBA",
            "name"=>"Aruba",
            "iso3"=>"ABW",
            "numcode"=>"533",
        ) );

        $this->insert("Country", array(
            "id"=>"13",
            "code"=>"AU",
            "namecap"=>"AUSTRALIA",
            "name"=>"Australia",
            "iso3"=>"AUS",
            "numcode"=>"36",
        ) );

        $this->insert("Country", array(
            "id"=>"14",
            "code"=>"AT",
            "namecap"=>"AUSTRIA",
            "name"=>"Austria",
            "iso3"=>"AUT",
            "numcode"=>"40",
        ) );

        $this->insert("Country", array(
            "id"=>"15",
            "code"=>"AZ",
            "namecap"=>"AZERBAIJAN",
            "name"=>"Azerbaijan",
            "iso3"=>"AZE",
            "numcode"=>"31",
        ) );

        $this->insert("Country", array(
            "id"=>"16",
            "code"=>"BS",
            "namecap"=>"BAHAMAS",
            "name"=>"Bahamas",
            "iso3"=>"BHS",
            "numcode"=>"44",
        ) );

        $this->insert("Country", array(
            "id"=>"17",
            "code"=>"BH",
            "namecap"=>"BAHRAIN",
            "name"=>"Bahrain",
            "iso3"=>"BHR",
            "numcode"=>"48",
        ) );

        $this->insert("Country", array(
            "id"=>"18",
            "code"=>"BD",
            "namecap"=>"BANGLADESH",
            "name"=>"Bangladesh",
            "iso3"=>"BGD",
            "numcode"=>"50",
        ) );

        $this->insert("Country", array(
            "id"=>"19",
            "code"=>"BB",
            "namecap"=>"BARBADOS",
            "name"=>"Barbados",
            "iso3"=>"BRB",
            "numcode"=>"52",
        ) );

        $this->insert("Country", array(
            "id"=>"20",
            "code"=>"BY",
            "namecap"=>"BELARUS",
            "name"=>"Belarus",
            "iso3"=>"BLR",
            "numcode"=>"112",
        ) );

        $this->insert("Country", array(
            "id"=>"21",
            "code"=>"BE",
            "namecap"=>"BELGIUM",
            "name"=>"Belgium",
            "iso3"=>"BEL",
            "numcode"=>"56",
        ) );

        $this->insert("Country", array(
            "id"=>"22",
            "code"=>"BZ",
            "namecap"=>"BELIZE",
            "name"=>"Belize",
            "iso3"=>"BLZ",
            "numcode"=>"84",
        ) );

        $this->insert("Country", array(
            "id"=>"23",
            "code"=>"BJ",
            "namecap"=>"BENIN",
            "name"=>"Benin",
            "iso3"=>"BEN",
            "numcode"=>"204",
        ) );

        $this->insert("Country", array(
            "id"=>"24",
            "code"=>"BM",
            "namecap"=>"BERMUDA",
            "name"=>"Bermuda",
            "iso3"=>"BMU",
            "numcode"=>"60",
        ) );

        $this->insert("Country", array(
            "id"=>"25",
            "code"=>"BT",
            "namecap"=>"BHUTAN",
            "name"=>"Bhutan",
            "iso3"=>"BTN",
            "numcode"=>"64",
        ) );

        $this->insert("Country", array(
            "id"=>"26",
            "code"=>"BO",
            "namecap"=>"BOLIVIA",
            "name"=>"Bolivia",
            "iso3"=>"BOL",
            "numcode"=>"68",
        ) );

        $this->insert("Country", array(
            "id"=>"27",
            "code"=>"BA",
            "namecap"=>"BOSNIA AND HERZEGOVINA",
            "name"=>"Bosnia and Herzegovina",
            "iso3"=>"BIH",
            "numcode"=>"70",
        ) );

        $this->insert("Country", array(
            "id"=>"28",
            "code"=>"BW",
            "namecap"=>"BOTSWANA",
            "name"=>"Botswana",
            "iso3"=>"BWA",
            "numcode"=>"72",
        ) );

        $this->insert("Country", array(
            "id"=>"29",
            "code"=>"BV",
            "namecap"=>"BOUVET ISLAND",
            "name"=>"Bouvet Island",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"30",
            "code"=>"BR",
            "namecap"=>"BRAZIL",
            "name"=>"Brazil",
            "iso3"=>"BRA",
            "numcode"=>"76",
        ) );

        $this->insert("Country", array(
            "id"=>"31",
            "code"=>"IO",
            "namecap"=>"BRITISH INDIAN OCEAN TERRITORY",
            "name"=>"British Indian Ocean Territory",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"32",
            "code"=>"BN",
            "namecap"=>"BRUNEI DARUSSALAM",
            "name"=>"Brunei Darussalam",
            "iso3"=>"BRN",
            "numcode"=>"96",
        ) );

        $this->insert("Country", array(
            "id"=>"33",
            "code"=>"BG",
            "namecap"=>"BULGARIA",
            "name"=>"Bulgaria",
            "iso3"=>"BGR",
            "numcode"=>"100",
        ) );

        $this->insert("Country", array(
            "id"=>"34",
            "code"=>"BF",
            "namecap"=>"BURKINA FASO",
            "name"=>"Burkina Faso",
            "iso3"=>"BFA",
            "numcode"=>"854",
        ) );

        $this->insert("Country", array(
            "id"=>"35",
            "code"=>"BI",
            "namecap"=>"BURUNDI",
            "name"=>"Burundi",
            "iso3"=>"BDI",
            "numcode"=>"108",
        ) );

        $this->insert("Country", array(
            "id"=>"36",
            "code"=>"KH",
            "namecap"=>"CAMBODIA",
            "name"=>"Cambodia",
            "iso3"=>"KHM",
            "numcode"=>"116",
        ) );

        $this->insert("Country", array(
            "id"=>"37",
            "code"=>"CM",
            "namecap"=>"CAMEROON",
            "name"=>"Cameroon",
            "iso3"=>"CMR",
            "numcode"=>"120",
        ) );

        $this->insert("Country", array(
            "id"=>"38",
            "code"=>"CA",
            "namecap"=>"CANADA",
            "name"=>"Canada",
            "iso3"=>"CAN",
            "numcode"=>"124",
        ) );

        $this->insert("Country", array(
            "id"=>"39",
            "code"=>"CV",
            "namecap"=>"CAPE VERDE",
            "name"=>"Cape Verde",
            "iso3"=>"CPV",
            "numcode"=>"132",
        ) );

        $this->insert("Country", array(
            "id"=>"40",
            "code"=>"KY",
            "namecap"=>"CAYMAN ISLANDS",
            "name"=>"Cayman Islands",
            "iso3"=>"CYM",
            "numcode"=>"136",
        ) );

        $this->insert("Country", array(
            "id"=>"41",
            "code"=>"CF",
            "namecap"=>"CENTRAL AFRICAN REPUBLIC",
            "name"=>"Central African Republic",
            "iso3"=>"CAF",
            "numcode"=>"140",
        ) );

        $this->insert("Country", array(
            "id"=>"42",
            "code"=>"TD",
            "namecap"=>"CHAD",
            "name"=>"Chad",
            "iso3"=>"TCD",
            "numcode"=>"148",
        ) );

        $this->insert("Country", array(
            "id"=>"43",
            "code"=>"CL",
            "namecap"=>"CHILE",
            "name"=>"Chile",
            "iso3"=>"CHL",
            "numcode"=>"152",
        ) );

        $this->insert("Country", array(
            "id"=>"44",
            "code"=>"CN",
            "namecap"=>"CHINA",
            "name"=>"China",
            "iso3"=>"CHN",
            "numcode"=>"156",
        ) );

        $this->insert("Country", array(
            "id"=>"45",
            "code"=>"CX",
            "namecap"=>"CHRISTMAS ISLAND",
            "name"=>"Christmas Island",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"46",
            "code"=>"CC",
            "namecap"=>"COCOS (KEELING) ISLANDS",
            "name"=>"Cocos (Keeling) Islands",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"47",
            "code"=>"CO",
            "namecap"=>"COLOMBIA",
            "name"=>"Colombia",
            "iso3"=>"COL",
            "numcode"=>"170",
        ) );

        $this->insert("Country", array(
            "id"=>"48",
            "code"=>"KM",
            "namecap"=>"COMOROS",
            "name"=>"Comoros",
            "iso3"=>"COM",
            "numcode"=>"174",
        ) );

        $this->insert("Country", array(
            "id"=>"49",
            "code"=>"CG",
            "namecap"=>"CONGO",
            "name"=>"Congo",
            "iso3"=>"COG",
            "numcode"=>"178",
        ) );

        $this->insert("Country", array(
            "id"=>"50",
            "code"=>"CD",
            "namecap"=>"CONGO, THE DEMOCRATIC REPUBLIC OF THE",
            "name"=>"Congo, the Democratic Republic of the",
            "iso3"=>"COD",
            "numcode"=>"180",
        ) );

        $this->insert("Country", array(
            "id"=>"51",
            "code"=>"CK",
            "namecap"=>"COOK ISLANDS",
            "name"=>"Cook Islands",
            "iso3"=>"COK",
            "numcode"=>"184",
        ) );

        $this->insert("Country", array(
            "id"=>"52",
            "code"=>"CR",
            "namecap"=>"COSTA RICA",
            "name"=>"Costa Rica",
            "iso3"=>"CRI",
            "numcode"=>"188",
        ) );

        $this->insert("Country", array(
            "id"=>"53",
            "code"=>"CI",
            "namecap"=>"COTE D'IVOIRE",
            "name"=>"Cote D'Ivoire",
            "iso3"=>"CIV",
            "numcode"=>"384",
        ) );

        $this->insert("Country", array(
            "id"=>"54",
            "code"=>"HR",
            "namecap"=>"CROATIA",
            "name"=>"Croatia",
            "iso3"=>"HRV",
            "numcode"=>"191",
        ) );

        $this->insert("Country", array(
            "id"=>"55",
            "code"=>"CU",
            "namecap"=>"CUBA",
            "name"=>"Cuba",
            "iso3"=>"CUB",
            "numcode"=>"192",
        ) );

        $this->insert("Country", array(
            "id"=>"56",
            "code"=>"CY",
            "namecap"=>"CYPRUS",
            "name"=>"Cyprus",
            "iso3"=>"CYP",
            "numcode"=>"196",
        ) );

        $this->insert("Country", array(
            "id"=>"57",
            "code"=>"CZ",
            "namecap"=>"CZECH REPUBLIC",
            "name"=>"Czech Republic",
            "iso3"=>"CZE",
            "numcode"=>"203",
        ) );

        $this->insert("Country", array(
            "id"=>"58",
            "code"=>"DK",
            "namecap"=>"DENMARK",
            "name"=>"Denmark",
            "iso3"=>"DNK",
            "numcode"=>"208",
        ) );

        $this->insert("Country", array(
            "id"=>"59",
            "code"=>"DJ",
            "namecap"=>"DJIBOUTI",
            "name"=>"Djibouti",
            "iso3"=>"DJI",
            "numcode"=>"262",
        ) );

        $this->insert("Country", array(
            "id"=>"60",
            "code"=>"DM",
            "namecap"=>"DOMINICA",
            "name"=>"Dominica",
            "iso3"=>"DMA",
            "numcode"=>"212",
        ) );

        $this->insert("Country", array(
            "id"=>"61",
            "code"=>"DO",
            "namecap"=>"DOMINICAN REPUBLIC",
            "name"=>"Dominican Republic",
            "iso3"=>"DOM",
            "numcode"=>"214",
        ) );

        $this->insert("Country", array(
            "id"=>"62",
            "code"=>"EC",
            "namecap"=>"ECUADOR",
            "name"=>"Ecuador",
            "iso3"=>"ECU",
            "numcode"=>"218",
        ) );

        $this->insert("Country", array(
            "id"=>"63",
            "code"=>"EG",
            "namecap"=>"EGYPT",
            "name"=>"Egypt",
            "iso3"=>"EGY",
            "numcode"=>"818",
        ) );

        $this->insert("Country", array(
            "id"=>"64",
            "code"=>"SV",
            "namecap"=>"EL SALVADOR",
            "name"=>"El Salvador",
            "iso3"=>"SLV",
            "numcode"=>"222",
        ) );

        $this->insert("Country", array(
            "id"=>"65",
            "code"=>"GQ",
            "namecap"=>"EQUATORIAL GUINEA",
            "name"=>"Equatorial Guinea",
            "iso3"=>"GNQ",
            "numcode"=>"226",
        ) );

        $this->insert("Country", array(
            "id"=>"66",
            "code"=>"ER",
            "namecap"=>"ERITREA",
            "name"=>"Eritrea",
            "iso3"=>"ERI",
            "numcode"=>"232",
        ) );

        $this->insert("Country", array(
            "id"=>"67",
            "code"=>"EE",
            "namecap"=>"ESTONIA",
            "name"=>"Estonia",
            "iso3"=>"EST",
            "numcode"=>"233",
        ) );

        $this->insert("Country", array(
            "id"=>"68",
            "code"=>"ET",
            "namecap"=>"ETHIOPIA",
            "name"=>"Ethiopia",
            "iso3"=>"ETH",
            "numcode"=>"231",
        ) );

        $this->insert("Country", array(
            "id"=>"69",
            "code"=>"FK",
            "namecap"=>"FALKLAND ISLANDS (MALVINAS)",
            "name"=>"Falkland Islands (Malvinas)",
            "iso3"=>"FLK",
            "numcode"=>"238",
        ) );

        $this->insert("Country", array(
            "id"=>"70",
            "code"=>"FO",
            "namecap"=>"FAROE ISLANDS",
            "name"=>"Faroe Islands",
            "iso3"=>"FRO",
            "numcode"=>"234",
        ) );

        $this->insert("Country", array(
            "id"=>"71",
            "code"=>"FJ",
            "namecap"=>"FIJI",
            "name"=>"Fiji",
            "iso3"=>"FJI",
            "numcode"=>"242",
        ) );

        $this->insert("Country", array(
            "id"=>"72",
            "code"=>"FI",
            "namecap"=>"FINLAND",
            "name"=>"Finland",
            "iso3"=>"FIN",
            "numcode"=>"246",
        ) );

        $this->insert("Country", array(
            "id"=>"73",
            "code"=>"FR",
            "namecap"=>"FRANCE",
            "name"=>"France",
            "iso3"=>"FRA",
            "numcode"=>"250",
        ) );

        $this->insert("Country", array(
            "id"=>"74",
            "code"=>"GF",
            "namecap"=>"FRENCH GUIANA",
            "name"=>"French Guiana",
            "iso3"=>"GUF",
            "numcode"=>"254",
        ) );

        $this->insert("Country", array(
            "id"=>"75",
            "code"=>"PF",
            "namecap"=>"FRENCH POLYNESIA",
            "name"=>"French Polynesia",
            "iso3"=>"PYF",
            "numcode"=>"258",
        ) );

        $this->insert("Country", array(
            "id"=>"76",
            "code"=>"TF",
            "namecap"=>"FRENCH SOUTHERN TERRITORIES",
            "name"=>"French Southern Territories",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"77",
            "code"=>"GA",
            "namecap"=>"GABON",
            "name"=>"Gabon",
            "iso3"=>"GAB",
            "numcode"=>"266",
        ) );

        $this->insert("Country", array(
            "id"=>"78",
            "code"=>"GM",
            "namecap"=>"GAMBIA",
            "name"=>"Gambia",
            "iso3"=>"GMB",
            "numcode"=>"270",
        ) );

        $this->insert("Country", array(
            "id"=>"79",
            "code"=>"GE",
            "namecap"=>"GEORGIA",
            "name"=>"Georgia",
            "iso3"=>"GEO",
            "numcode"=>"268",
        ) );

        $this->insert("Country", array(
            "id"=>"80",
            "code"=>"DE",
            "namecap"=>"GERMANY",
            "name"=>"Germany",
            "iso3"=>"DEU",
            "numcode"=>"276",
        ) );

        $this->insert("Country", array(
            "id"=>"81",
            "code"=>"GH",
            "namecap"=>"GHANA",
            "name"=>"Ghana",
            "iso3"=>"GHA",
            "numcode"=>"288",
        ) );

        $this->insert("Country", array(
            "id"=>"82",
            "code"=>"GI",
            "namecap"=>"GIBRALTAR",
            "name"=>"Gibraltar",
            "iso3"=>"GIB",
            "numcode"=>"292",
        ) );

        $this->insert("Country", array(
            "id"=>"83",
            "code"=>"GR",
            "namecap"=>"GREECE",
            "name"=>"Greece",
            "iso3"=>"GRC",
            "numcode"=>"300",
        ) );

        $this->insert("Country", array(
            "id"=>"84",
            "code"=>"GL",
            "namecap"=>"GREENLAND",
            "name"=>"Greenland",
            "iso3"=>"GRL",
            "numcode"=>"304",
        ) );

        $this->insert("Country", array(
            "id"=>"85",
            "code"=>"GD",
            "namecap"=>"GRENADA",
            "name"=>"Grenada",
            "iso3"=>"GRD",
            "numcode"=>"308",
        ) );

        $this->insert("Country", array(
            "id"=>"86",
            "code"=>"GP",
            "namecap"=>"GUADELOUPE",
            "name"=>"Guadeloupe",
            "iso3"=>"GLP",
            "numcode"=>"312",
        ) );

        $this->insert("Country", array(
            "id"=>"87",
            "code"=>"GU",
            "namecap"=>"GUAM",
            "name"=>"Guam",
            "iso3"=>"GUM",
            "numcode"=>"316",
        ) );

        $this->insert("Country", array(
            "id"=>"88",
            "code"=>"GT",
            "namecap"=>"GUATEMALA",
            "name"=>"Guatemala",
            "iso3"=>"GTM",
            "numcode"=>"320",
        ) );

        $this->insert("Country", array(
            "id"=>"89",
            "code"=>"GN",
            "namecap"=>"GUINEA",
            "name"=>"Guinea",
            "iso3"=>"GIN",
            "numcode"=>"324",
        ) );

        $this->insert("Country", array(
            "id"=>"90",
            "code"=>"GW",
            "namecap"=>"GUINEA-BISSAU",
            "name"=>"Guinea-Bissau",
            "iso3"=>"GNB",
            "numcode"=>"624",
        ) );

        $this->insert("Country", array(
            "id"=>"91",
            "code"=>"GY",
            "namecap"=>"GUYANA",
            "name"=>"Guyana",
            "iso3"=>"GUY",
            "numcode"=>"328",
        ) );

        $this->insert("Country", array(
            "id"=>"92",
            "code"=>"HT",
            "namecap"=>"HAITI",
            "name"=>"Haiti",
            "iso3"=>"HTI",
            "numcode"=>"332",
        ) );

        $this->insert("Country", array(
            "id"=>"93",
            "code"=>"HM",
            "namecap"=>"HEARD ISLAND AND MCDONALD ISLANDS",
            "name"=>"Heard Island and Mcdonald Islands",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"94",
            "code"=>"VA",
            "namecap"=>"HOLY SEE (VATICAN CITY STATE)",
            "name"=>"Holy See (Vatican City State)",
            "iso3"=>"VAT",
            "numcode"=>"336",
        ) );

        $this->insert("Country", array(
            "id"=>"95",
            "code"=>"HN",
            "namecap"=>"HONDURAS",
            "name"=>"Honduras",
            "iso3"=>"HND",
            "numcode"=>"340",
        ) );

        $this->insert("Country", array(
            "id"=>"96",
            "code"=>"HK",
            "namecap"=>"HONG KONG",
            "name"=>"Hong Kong",
            "iso3"=>"HKG",
            "numcode"=>"344",
        ) );

        $this->insert("Country", array(
            "id"=>"97",
            "code"=>"HU",
            "namecap"=>"HUNGARY",
            "name"=>"Hungary",
            "iso3"=>"HUN",
            "numcode"=>"348",
        ) );

        $this->insert("Country", array(
            "id"=>"98",
            "code"=>"IS",
            "namecap"=>"ICELAND",
            "name"=>"Iceland",
            "iso3"=>"ISL",
            "numcode"=>"352",
        ) );

        $this->insert("Country", array(
            "id"=>"99",
            "code"=>"IN",
            "namecap"=>"INDIA",
            "name"=>"India",
            "iso3"=>"IND",
            "numcode"=>"356",
        ) );

        $this->insert("Country", array(
            "id"=>"100",
            "code"=>"ID",
            "namecap"=>"INDONESIA",
            "name"=>"Indonesia",
            "iso3"=>"IDN",
            "numcode"=>"360",
        ) );

        $this->insert("Country", array(
            "id"=>"101",
            "code"=>"IR",
            "namecap"=>"IRAN, ISLAMIC REPUBLIC OF",
            "name"=>"Iran, Islamic Republic of",
            "iso3"=>"IRN",
            "numcode"=>"364",
        ) );

        $this->insert("Country", array(
            "id"=>"102",
            "code"=>"IQ",
            "namecap"=>"IRAQ",
            "name"=>"Iraq",
            "iso3"=>"IRQ",
            "numcode"=>"368",
        ) );

        $this->insert("Country", array(
            "id"=>"103",
            "code"=>"IE",
            "namecap"=>"IRELAND",
            "name"=>"Ireland",
            "iso3"=>"IRL",
            "numcode"=>"372",
        ) );

        $this->insert("Country", array(
            "id"=>"104",
            "code"=>"IL",
            "namecap"=>"ISRAEL",
            "name"=>"Israel",
            "iso3"=>"ISR",
            "numcode"=>"376",
        ) );

        $this->insert("Country", array(
            "id"=>"105",
            "code"=>"IT",
            "namecap"=>"ITALY",
            "name"=>"Italy",
            "iso3"=>"ITA",
            "numcode"=>"380",
        ) );

        $this->insert("Country", array(
            "id"=>"106",
            "code"=>"JM",
            "namecap"=>"JAMAICA",
            "name"=>"Jamaica",
            "iso3"=>"JAM",
            "numcode"=>"388",
        ) );

        $this->insert("Country", array(
            "id"=>"107",
            "code"=>"JP",
            "namecap"=>"JAPAN",
            "name"=>"Japan",
            "iso3"=>"JPN",
            "numcode"=>"392",
        ) );

        $this->insert("Country", array(
            "id"=>"108",
            "code"=>"JO",
            "namecap"=>"JORDAN",
            "name"=>"Jordan",
            "iso3"=>"JOR",
            "numcode"=>"400",
        ) );

        $this->insert("Country", array(
            "id"=>"109",
            "code"=>"KZ",
            "namecap"=>"KAZAKHSTAN",
            "name"=>"Kazakhstan",
            "iso3"=>"KAZ",
            "numcode"=>"398",
        ) );

        $this->insert("Country", array(
            "id"=>"110",
            "code"=>"KE",
            "namecap"=>"KENYA",
            "name"=>"Kenya",
            "iso3"=>"KEN",
            "numcode"=>"404",
        ) );

        $this->insert("Country", array(
            "id"=>"111",
            "code"=>"KI",
            "namecap"=>"KIRIBATI",
            "name"=>"Kiribati",
            "iso3"=>"KIR",
            "numcode"=>"296",
        ) );

        $this->insert("Country", array(
            "id"=>"112",
            "code"=>"KP",
            "namecap"=>"KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF",
            "name"=>"Korea, Democratic People's Republic of",
            "iso3"=>"PRK",
            "numcode"=>"408",
        ) );

        $this->insert("Country", array(
            "id"=>"113",
            "code"=>"KR",
            "namecap"=>"KOREA, REPUBLIC OF",
            "name"=>"Korea, Republic of",
            "iso3"=>"KOR",
            "numcode"=>"410",
        ) );

        $this->insert("Country", array(
            "id"=>"114",
            "code"=>"KW",
            "namecap"=>"KUWAIT",
            "name"=>"Kuwait",
            "iso3"=>"KWT",
            "numcode"=>"414",
        ) );

        $this->insert("Country", array(
            "id"=>"115",
            "code"=>"KG",
            "namecap"=>"KYRGYZSTAN",
            "name"=>"Kyrgyzstan",
            "iso3"=>"KGZ",
            "numcode"=>"417",
        ) );

        $this->insert("Country", array(
            "id"=>"116",
            "code"=>"LA",
            "namecap"=>"LAO PEOPLE'S DEMOCRATIC REPUBLIC",
            "name"=>"Lao People's Democratic Republic",
            "iso3"=>"LAO",
            "numcode"=>"418",
        ) );

        $this->insert("Country", array(
            "id"=>"117",
            "code"=>"LV",
            "namecap"=>"LATVIA",
            "name"=>"Latvia",
            "iso3"=>"LVA",
            "numcode"=>"428",
        ) );

        $this->insert("Country", array(
            "id"=>"118",
            "code"=>"LB",
            "namecap"=>"LEBANON",
            "name"=>"Lebanon",
            "iso3"=>"LBN",
            "numcode"=>"422",
        ) );

        $this->insert("Country", array(
            "id"=>"119",
            "code"=>"LS",
            "namecap"=>"LESOTHO",
            "name"=>"Lesotho",
            "iso3"=>"LSO",
            "numcode"=>"426",
        ) );

        $this->insert("Country", array(
            "id"=>"120",
            "code"=>"LR",
            "namecap"=>"LIBERIA",
            "name"=>"Liberia",
            "iso3"=>"LBR",
            "numcode"=>"430",
        ) );

        $this->insert("Country", array(
            "id"=>"121",
            "code"=>"LY",
            "namecap"=>"LIBYAN ARAB JAMAHIRIYA",
            "name"=>"Libyan Arab Jamahiriya",
            "iso3"=>"LBY",
            "numcode"=>"434",
        ) );

        $this->insert("Country", array(
            "id"=>"122",
            "code"=>"LI",
            "namecap"=>"LIECHTENSTEIN",
            "name"=>"Liechtenstein",
            "iso3"=>"LIE",
            "numcode"=>"438",
        ) );

        $this->insert("Country", array(
            "id"=>"123",
            "code"=>"LT",
            "namecap"=>"LITHUANIA",
            "name"=>"Lithuania",
            "iso3"=>"LTU",
            "numcode"=>"440",
        ) );

        $this->insert("Country", array(
            "id"=>"124",
            "code"=>"LU",
            "namecap"=>"LUXEMBOURG",
            "name"=>"Luxembourg",
            "iso3"=>"LUX",
            "numcode"=>"442",
        ) );

        $this->insert("Country", array(
            "id"=>"125",
            "code"=>"MO",
            "namecap"=>"MACAO",
            "name"=>"Macao",
            "iso3"=>"MAC",
            "numcode"=>"446",
        ) );

        $this->insert("Country", array(
            "id"=>"126",
            "code"=>"MK",
            "namecap"=>"MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF",
            "name"=>"Macedonia, the Former Yugoslav Republic of",
            "iso3"=>"MKD",
            "numcode"=>"807",
        ) );

        $this->insert("Country", array(
            "id"=>"127",
            "code"=>"MG",
            "namecap"=>"MADAGASCAR",
            "name"=>"Madagascar",
            "iso3"=>"MDG",
            "numcode"=>"450",
        ) );

        $this->insert("Country", array(
            "id"=>"128",
            "code"=>"MW",
            "namecap"=>"MALAWI",
            "name"=>"Malawi",
            "iso3"=>"MWI",
            "numcode"=>"454",
        ) );

        $this->insert("Country", array(
            "id"=>"129",
            "code"=>"MY",
            "namecap"=>"MALAYSIA",
            "name"=>"Malaysia",
            "iso3"=>"MYS",
            "numcode"=>"458",
        ) );

        $this->insert("Country", array(
            "id"=>"130",
            "code"=>"MV",
            "namecap"=>"MALDIVES",
            "name"=>"Maldives",
            "iso3"=>"MDV",
            "numcode"=>"462",
        ) );

        $this->insert("Country", array(
            "id"=>"131",
            "code"=>"ML",
            "namecap"=>"MALI",
            "name"=>"Mali",
            "iso3"=>"MLI",
            "numcode"=>"466",
        ) );

        $this->insert("Country", array(
            "id"=>"132",
            "code"=>"MT",
            "namecap"=>"MALTA",
            "name"=>"Malta",
            "iso3"=>"MLT",
            "numcode"=>"470",
        ) );

        $this->insert("Country", array(
            "id"=>"133",
            "code"=>"MH",
            "namecap"=>"MARSHALL ISLANDS",
            "name"=>"Marshall Islands",
            "iso3"=>"MHL",
            "numcode"=>"584",
        ) );

        $this->insert("Country", array(
            "id"=>"134",
            "code"=>"MQ",
            "namecap"=>"MARTINIQUE",
            "name"=>"Martinique",
            "iso3"=>"MTQ",
            "numcode"=>"474",
        ) );

        $this->insert("Country", array(
            "id"=>"135",
            "code"=>"MR",
            "namecap"=>"MAURITANIA",
            "name"=>"Mauritania",
            "iso3"=>"MRT",
            "numcode"=>"478",
        ) );

        $this->insert("Country", array(
            "id"=>"136",
            "code"=>"MU",
            "namecap"=>"MAURITIUS",
            "name"=>"Mauritius",
            "iso3"=>"MUS",
            "numcode"=>"480",
        ) );

        $this->insert("Country", array(
            "id"=>"137",
            "code"=>"YT",
            "namecap"=>"MAYOTTE",
            "name"=>"Mayotte",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"138",
            "code"=>"MX",
            "namecap"=>"MEXICO",
            "name"=>"Mexico",
            "iso3"=>"MEX",
            "numcode"=>"484",
        ) );

        $this->insert("Country", array(
            "id"=>"139",
            "code"=>"FM",
            "namecap"=>"MICRONESIA, FEDERATED STATES OF",
            "name"=>"Micronesia, Federated States of",
            "iso3"=>"FSM",
            "numcode"=>"583",
        ) );

        $this->insert("Country", array(
            "id"=>"140",
            "code"=>"MD",
            "namecap"=>"MOLDOVA, REPUBLIC OF",
            "name"=>"Moldova, Republic of",
            "iso3"=>"MDA",
            "numcode"=>"498",
        ) );

        $this->insert("Country", array(
            "id"=>"141",
            "code"=>"MC",
            "namecap"=>"MONACO",
            "name"=>"Monaco",
            "iso3"=>"MCO",
            "numcode"=>"492",
        ) );

        $this->insert("Country", array(
            "id"=>"142",
            "code"=>"MN",
            "namecap"=>"MONGOLIA",
            "name"=>"Mongolia",
            "iso3"=>"MNG",
            "numcode"=>"496",
        ) );

        $this->insert("Country", array(
            "id"=>"143",
            "code"=>"MS",
            "namecap"=>"MONTSERRAT",
            "name"=>"Montserrat",
            "iso3"=>"MSR",
            "numcode"=>"500",
        ) );

        $this->insert("Country", array(
            "id"=>"144",
            "code"=>"MA",
            "namecap"=>"MOROCCO",
            "name"=>"Morocco",
            "iso3"=>"MAR",
            "numcode"=>"504",
        ) );

        $this->insert("Country", array(
            "id"=>"145",
            "code"=>"MZ",
            "namecap"=>"MOZAMBIQUE",
            "name"=>"Mozambique",
            "iso3"=>"MOZ",
            "numcode"=>"508",
        ) );

        $this->insert("Country", array(
            "id"=>"146",
            "code"=>"MM",
            "namecap"=>"MYANMAR",
            "name"=>"Myanmar",
            "iso3"=>"MMR",
            "numcode"=>"104",
        ) );

        $this->insert("Country", array(
            "id"=>"147",
            "code"=>"NA",
            "namecap"=>"NAMIBIA",
            "name"=>"Namibia",
            "iso3"=>"NAM",
            "numcode"=>"516",
        ) );

        $this->insert("Country", array(
            "id"=>"148",
            "code"=>"NR",
            "namecap"=>"NAURU",
            "name"=>"Nauru",
            "iso3"=>"NRU",
            "numcode"=>"520",
        ) );

        $this->insert("Country", array(
            "id"=>"149",
            "code"=>"NP",
            "namecap"=>"NEPAL",
            "name"=>"Nepal",
            "iso3"=>"NPL",
            "numcode"=>"524",
        ) );

        $this->insert("Country", array(
            "id"=>"150",
            "code"=>"NL",
            "namecap"=>"NETHERLANDS",
            "name"=>"Netherlands",
            "iso3"=>"NLD",
            "numcode"=>"528",
        ) );

        $this->insert("Country", array(
            "id"=>"151",
            "code"=>"AN",
            "namecap"=>"NETHERLANDS ANTILLES",
            "name"=>"Netherlands Antilles",
            "iso3"=>"ANT",
            "numcode"=>"530",
        ) );

        $this->insert("Country", array(
            "id"=>"152",
            "code"=>"NC",
            "namecap"=>"NEW CALEDONIA",
            "name"=>"New Caledonia",
            "iso3"=>"NCL",
            "numcode"=>"540",
        ) );

        $this->insert("Country", array(
            "id"=>"153",
            "code"=>"NZ",
            "namecap"=>"NEW ZEALAND",
            "name"=>"New Zealand",
            "iso3"=>"NZL",
            "numcode"=>"554",
        ) );

        $this->insert("Country", array(
            "id"=>"154",
            "code"=>"NI",
            "namecap"=>"NICARAGUA",
            "name"=>"Nicaragua",
            "iso3"=>"NIC",
            "numcode"=>"558",
        ) );

        $this->insert("Country", array(
            "id"=>"155",
            "code"=>"NE",
            "namecap"=>"NIGER",
            "name"=>"Niger",
            "iso3"=>"NER",
            "numcode"=>"562",
        ) );

        $this->insert("Country", array(
            "id"=>"156",
            "code"=>"NG",
            "namecap"=>"NIGERIA",
            "name"=>"Nigeria",
            "iso3"=>"NGA",
            "numcode"=>"566",
        ) );

        $this->insert("Country", array(
            "id"=>"157",
            "code"=>"NU",
            "namecap"=>"NIUE",
            "name"=>"Niue",
            "iso3"=>"NIU",
            "numcode"=>"570",
        ) );

        $this->insert("Country", array(
            "id"=>"158",
            "code"=>"NF",
            "namecap"=>"NORFOLK ISLAND",
            "name"=>"Norfolk Island",
            "iso3"=>"NFK",
            "numcode"=>"574",
        ) );

        $this->insert("Country", array(
            "id"=>"159",
            "code"=>"MP",
            "namecap"=>"NORTHERN MARIANA ISLANDS",
            "name"=>"Northern Mariana Islands",
            "iso3"=>"MNP",
            "numcode"=>"580",
        ) );

        $this->insert("Country", array(
            "id"=>"160",
            "code"=>"NO",
            "namecap"=>"NORWAY",
            "name"=>"Norway",
            "iso3"=>"NOR",
            "numcode"=>"578",
        ) );

        $this->insert("Country", array(
            "id"=>"161",
            "code"=>"OM",
            "namecap"=>"OMAN",
            "name"=>"Oman",
            "iso3"=>"OMN",
            "numcode"=>"512",
        ) );

        $this->insert("Country", array(
            "id"=>"162",
            "code"=>"PK",
            "namecap"=>"PAKISTAN",
            "name"=>"Pakistan",
            "iso3"=>"PAK",
            "numcode"=>"586",
        ) );

        $this->insert("Country", array(
            "id"=>"163",
            "code"=>"PW",
            "namecap"=>"PALAU",
            "name"=>"Palau",
            "iso3"=>"PLW",
            "numcode"=>"585",
        ) );

        $this->insert("Country", array(
            "id"=>"164",
            "code"=>"PS",
            "namecap"=>"PALESTINIAN TERRITORY, OCCUPIED",
            "name"=>"Palestinian Territory, Occupied",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"165",
            "code"=>"PA",
            "namecap"=>"PANAMA",
            "name"=>"Panama",
            "iso3"=>"PAN",
            "numcode"=>"591",
        ) );

        $this->insert("Country", array(
            "id"=>"166",
            "code"=>"PG",
            "namecap"=>"PAPUA NEW GUINEA",
            "name"=>"Papua New Guinea",
            "iso3"=>"PNG",
            "numcode"=>"598",
        ) );

        $this->insert("Country", array(
            "id"=>"167",
            "code"=>"PY",
            "namecap"=>"PARAGUAY",
            "name"=>"Paraguay",
            "iso3"=>"PRY",
            "numcode"=>"600",
        ) );

        $this->insert("Country", array(
            "id"=>"168",
            "code"=>"PE",
            "namecap"=>"PERU",
            "name"=>"Peru",
            "iso3"=>"PER",
            "numcode"=>"604",
        ) );

        $this->insert("Country", array(
            "id"=>"169",
            "code"=>"PH",
            "namecap"=>"PHILIPPINES",
            "name"=>"Philippines",
            "iso3"=>"PHL",
            "numcode"=>"608",
        ) );

        $this->insert("Country", array(
            "id"=>"170",
            "code"=>"PN",
            "namecap"=>"PITCAIRN",
            "name"=>"Pitcairn",
            "iso3"=>"PCN",
            "numcode"=>"612",
        ) );

        $this->insert("Country", array(
            "id"=>"171",
            "code"=>"PL",
            "namecap"=>"POLAND",
            "name"=>"Poland",
            "iso3"=>"POL",
            "numcode"=>"616",
        ) );

        $this->insert("Country", array(
            "id"=>"172",
            "code"=>"PT",
            "namecap"=>"PORTUGAL",
            "name"=>"Portugal",
            "iso3"=>"PRT",
            "numcode"=>"620",
        ) );

        $this->insert("Country", array(
            "id"=>"173",
            "code"=>"PR",
            "namecap"=>"PUERTO RICO",
            "name"=>"Puerto Rico",
            "iso3"=>"PRI",
            "numcode"=>"630",
        ) );

        $this->insert("Country", array(
            "id"=>"174",
            "code"=>"QA",
            "namecap"=>"QATAR",
            "name"=>"Qatar",
            "iso3"=>"QAT",
            "numcode"=>"634",
        ) );

        $this->insert("Country", array(
            "id"=>"175",
            "code"=>"RE",
            "namecap"=>"REUNION",
            "name"=>"Reunion",
            "iso3"=>"REU",
            "numcode"=>"638",
        ) );

        $this->insert("Country", array(
            "id"=>"176",
            "code"=>"RO",
            "namecap"=>"ROMANIA",
            "name"=>"Romania",
            "iso3"=>"ROM",
            "numcode"=>"642",
        ) );

        $this->insert("Country", array(
            "id"=>"177",
            "code"=>"RU",
            "namecap"=>"RUSSIAN FEDERATION",
            "name"=>"Russian Federation",
            "iso3"=>"RUS",
            "numcode"=>"643",
        ) );

        $this->insert("Country", array(
            "id"=>"178",
            "code"=>"RW",
            "namecap"=>"RWANDA",
            "name"=>"Rwanda",
            "iso3"=>"RWA",
            "numcode"=>"646",
        ) );

        $this->insert("Country", array(
            "id"=>"179",
            "code"=>"SH",
            "namecap"=>"SAINT HELENA",
            "name"=>"Saint Helena",
            "iso3"=>"SHN",
            "numcode"=>"654",
        ) );

        $this->insert("Country", array(
            "id"=>"180",
            "code"=>"KN",
            "namecap"=>"SAINT KITTS AND NEVIS",
            "name"=>"Saint Kitts and Nevis",
            "iso3"=>"KNA",
            "numcode"=>"659",
        ) );

        $this->insert("Country", array(
            "id"=>"181",
            "code"=>"LC",
            "namecap"=>"SAINT LUCIA",
            "name"=>"Saint Lucia",
            "iso3"=>"LCA",
            "numcode"=>"662",
        ) );

        $this->insert("Country", array(
            "id"=>"182",
            "code"=>"PM",
            "namecap"=>"SAINT PIERRE AND MIQUELON",
            "name"=>"Saint Pierre and Miquelon",
            "iso3"=>"SPM",
            "numcode"=>"666",
        ) );

        $this->insert("Country", array(
            "id"=>"183",
            "code"=>"VC",
            "namecap"=>"SAINT VINCENT AND THE GRENADINES",
            "name"=>"Saint Vincent and the Grenadines",
            "iso3"=>"VCT",
            "numcode"=>"670",
        ) );

        $this->insert("Country", array(
            "id"=>"184",
            "code"=>"WS",
            "namecap"=>"SAMOA",
            "name"=>"Samoa",
            "iso3"=>"WSM",
            "numcode"=>"882",
        ) );

        $this->insert("Country", array(
            "id"=>"185",
            "code"=>"SM",
            "namecap"=>"SAN MARINO",
            "name"=>"San Marino",
            "iso3"=>"SMR",
            "numcode"=>"674",
        ) );

        $this->insert("Country", array(
            "id"=>"186",
            "code"=>"ST",
            "namecap"=>"SAO TOME AND PRINCIPE",
            "name"=>"Sao Tome and Principe",
            "iso3"=>"STP",
            "numcode"=>"678",
        ) );

        $this->insert("Country", array(
            "id"=>"187",
            "code"=>"SA",
            "namecap"=>"SAUDI ARABIA",
            "name"=>"Saudi Arabia",
            "iso3"=>"SAU",
            "numcode"=>"682",
        ) );

        $this->insert("Country", array(
            "id"=>"188",
            "code"=>"SN",
            "namecap"=>"SENEGAL",
            "name"=>"Senegal",
            "iso3"=>"SEN",
            "numcode"=>"686",
        ) );

        $this->insert("Country", array(
            "id"=>"189",
            "code"=>"CS",
            "namecap"=>"SERBIA AND MONTENEGRO",
            "name"=>"Serbia and Montenegro",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"190",
            "code"=>"SC",
            "namecap"=>"SEYCHELLES",
            "name"=>"Seychelles",
            "iso3"=>"SYC",
            "numcode"=>"690",
        ) );

        $this->insert("Country", array(
            "id"=>"191",
            "code"=>"SL",
            "namecap"=>"SIERRA LEONE",
            "name"=>"Sierra Leone",
            "iso3"=>"SLE",
            "numcode"=>"694",
        ) );

        $this->insert("Country", array(
            "id"=>"192",
            "code"=>"SG",
            "namecap"=>"SINGAPORE",
            "name"=>"Singapore",
            "iso3"=>"SGP",
            "numcode"=>"702",
        ) );

        $this->insert("Country", array(
            "id"=>"193",
            "code"=>"SK",
            "namecap"=>"SLOVAKIA",
            "name"=>"Slovakia",
            "iso3"=>"SVK",
            "numcode"=>"703",
        ) );

        $this->insert("Country", array(
            "id"=>"194",
            "code"=>"SI",
            "namecap"=>"SLOVENIA",
            "name"=>"Slovenia",
            "iso3"=>"SVN",
            "numcode"=>"705",
        ) );

        $this->insert("Country", array(
            "id"=>"195",
            "code"=>"SB",
            "namecap"=>"SOLOMON ISLANDS",
            "name"=>"Solomon Islands",
            "iso3"=>"SLB",
            "numcode"=>"90",
        ) );

        $this->insert("Country", array(
            "id"=>"196",
            "code"=>"SO",
            "namecap"=>"SOMALIA",
            "name"=>"Somalia",
            "iso3"=>"SOM",
            "numcode"=>"706",
        ) );

        $this->insert("Country", array(
            "id"=>"197",
            "code"=>"ZA",
            "namecap"=>"SOUTH AFRICA",
            "name"=>"South Africa",
            "iso3"=>"ZAF",
            "numcode"=>"710",
        ) );

        $this->insert("Country", array(
            "id"=>"198",
            "code"=>"GS",
            "namecap"=>"SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS",
            "name"=>"South Georgia and the South Sandwich Islands",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"199",
            "code"=>"ES",
            "namecap"=>"SPAIN",
            "name"=>"Spain",
            "iso3"=>"ESP",
            "numcode"=>"724",
        ) );

        $this->insert("Country", array(
            "id"=>"200",
            "code"=>"LK",
            "namecap"=>"SRI LANKA",
            "name"=>"Sri Lanka",
            "iso3"=>"LKA",
            "numcode"=>"144",
        ) );

        $this->insert("Country", array(
            "id"=>"201",
            "code"=>"SD",
            "namecap"=>"SUDAN",
            "name"=>"Sudan",
            "iso3"=>"SDN",
            "numcode"=>"736",
        ) );

        $this->insert("Country", array(
            "id"=>"202",
            "code"=>"SR",
            "namecap"=>"SURINAME",
            "name"=>"Suriname",
            "iso3"=>"SUR",
            "numcode"=>"740",
        ) );

        $this->insert("Country", array(
            "id"=>"203",
            "code"=>"SJ",
            "namecap"=>"SVALBARD AND JAN MAYEN",
            "name"=>"Svalbard and Jan Mayen",
            "iso3"=>"SJM",
            "numcode"=>"744",
        ) );

        $this->insert("Country", array(
            "id"=>"204",
            "code"=>"SZ",
            "namecap"=>"SWAZILAND",
            "name"=>"Swaziland",
            "iso3"=>"SWZ",
            "numcode"=>"748",
        ) );

        $this->insert("Country", array(
            "id"=>"205",
            "code"=>"SE",
            "namecap"=>"SWEDEN",
            "name"=>"Sweden",
            "iso3"=>"SWE",
            "numcode"=>"752",
        ) );

        $this->insert("Country", array(
            "id"=>"206",
            "code"=>"CH",
            "namecap"=>"SWITZERLAND",
            "name"=>"Switzerland",
            "iso3"=>"CHE",
            "numcode"=>"756",
        ) );

        $this->insert("Country", array(
            "id"=>"207",
            "code"=>"SY",
            "namecap"=>"SYRIAN ARAB REPUBLIC",
            "name"=>"Syrian Arab Republic",
            "iso3"=>"SYR",
            "numcode"=>"760",
        ) );

        $this->insert("Country", array(
            "id"=>"208",
            "code"=>"TW",
            "namecap"=>"TAIWAN, PROVINCE OF CHINA",
            "name"=>"Taiwan",
            "iso3"=>"TWN",
            "numcode"=>"158",
        ) );

        $this->insert("Country", array(
            "id"=>"209",
            "code"=>"TJ",
            "namecap"=>"TAJIKISTAN",
            "name"=>"Tajikistan",
            "iso3"=>"TJK",
            "numcode"=>"762",
        ) );

        $this->insert("Country", array(
            "id"=>"210",
            "code"=>"TZ",
            "namecap"=>"TANZANIA, UNITED REPUBLIC OF",
            "name"=>"Tanzania, United Republic of",
            "iso3"=>"TZA",
            "numcode"=>"834",
        ) );

        $this->insert("Country", array(
            "id"=>"211",
            "code"=>"TH",
            "namecap"=>"THAILAND",
            "name"=>"Thailand",
            "iso3"=>"THA",
            "numcode"=>"764",
        ) );

        $this->insert("Country", array(
            "id"=>"212",
            "code"=>"TL",
            "namecap"=>"TIMOR-LESTE",
            "name"=>"Timor-Leste",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"213",
            "code"=>"TG",
            "namecap"=>"TOGO",
            "name"=>"Togo",
            "iso3"=>"TGO",
            "numcode"=>"768",
        ) );

        $this->insert("Country", array(
            "id"=>"214",
            "code"=>"TK",
            "namecap"=>"TOKELAU",
            "name"=>"Tokelau",
            "iso3"=>"TKL",
            "numcode"=>"772",
        ) );

        $this->insert("Country", array(
            "id"=>"215",
            "code"=>"TO",
            "namecap"=>"TONGA",
            "name"=>"Tonga",
            "iso3"=>"TON",
            "numcode"=>"776",
        ) );

        $this->insert("Country", array(
            "id"=>"216",
            "code"=>"TT",
            "namecap"=>"TRINIDAD AND TOBAGO",
            "name"=>"Trinidad and Tobago",
            "iso3"=>"TTO",
            "numcode"=>"780",
        ) );

        $this->insert("Country", array(
            "id"=>"217",
            "code"=>"TN",
            "namecap"=>"TUNISIA",
            "name"=>"Tunisia",
            "iso3"=>"TUN",
            "numcode"=>"788",
        ) );

        $this->insert("Country", array(
            "id"=>"218",
            "code"=>"TR",
            "namecap"=>"TURKEY",
            "name"=>"Turkey",
            "iso3"=>"TUR",
            "numcode"=>"792",
        ) );

        $this->insert("Country", array(
            "id"=>"219",
            "code"=>"TM",
            "namecap"=>"TURKMENISTAN",
            "name"=>"Turkmenistan",
            "iso3"=>"TKM",
            "numcode"=>"795",
        ) );

        $this->insert("Country", array(
            "id"=>"220",
            "code"=>"TC",
            "namecap"=>"TURKS AND CAICOS ISLANDS",
            "name"=>"Turks and Caicos Islands",
            "iso3"=>"TCA",
            "numcode"=>"796",
        ) );

        $this->insert("Country", array(
            "id"=>"221",
            "code"=>"TV",
            "namecap"=>"TUVALU",
            "name"=>"Tuvalu",
            "iso3"=>"TUV",
            "numcode"=>"798",
        ) );

        $this->insert("Country", array(
            "id"=>"222",
            "code"=>"UG",
            "namecap"=>"UGANDA",
            "name"=>"Uganda",
            "iso3"=>"UGA",
            "numcode"=>"800",
        ) );

        $this->insert("Country", array(
            "id"=>"223",
            "code"=>"UA",
            "namecap"=>"UKRAINE",
            "name"=>"Ukraine",
            "iso3"=>"UKR",
            "numcode"=>"804",
        ) );

        $this->insert("Country", array(
            "id"=>"224",
            "code"=>"AE",
            "namecap"=>"UNITED ARAB EMIRATES",
            "name"=>"United Arab Emirates",
            "iso3"=>"ARE",
            "numcode"=>"784",
        ) );

        $this->insert("Country", array(
            "id"=>"225",
            "code"=>"GB",
            "namecap"=>"UNITED KINGDOM",
            "name"=>"United Kingdom",
            "iso3"=>"GBR",
            "numcode"=>"826",
        ) );

        $this->insert("Country", array(
            "id"=>"226",
            "code"=>"US",
            "namecap"=>"UNITED STATES",
            "name"=>"United States",
            "iso3"=>"USA",
            "numcode"=>"840",
        ) );

        $this->insert("Country", array(
            "id"=>"227",
            "code"=>"UM",
            "namecap"=>"UNITED STATES MINOR OUTLYING ISLANDS",
            "name"=>"United States Minor Outlying Islands",
            "iso3"=>null,
            "numcode"=>null,
        ) );

        $this->insert("Country", array(
            "id"=>"228",
            "code"=>"UY",
            "namecap"=>"URUGUAY",
            "name"=>"Uruguay",
            "iso3"=>"URY",
            "numcode"=>"858",
        ) );

        $this->insert("Country", array(
            "id"=>"229",
            "code"=>"UZ",
            "namecap"=>"UZBEKISTAN",
            "name"=>"Uzbekistan",
            "iso3"=>"UZB",
            "numcode"=>"860",
        ) );

        $this->insert("Country", array(
            "id"=>"230",
            "code"=>"VU",
            "namecap"=>"VANUATU",
            "name"=>"Vanuatu",
            "iso3"=>"VUT",
            "numcode"=>"548",
        ) );

        $this->insert("Country", array(
            "id"=>"231",
            "code"=>"VE",
            "namecap"=>"VENEZUELA",
            "name"=>"Venezuela",
            "iso3"=>"VEN",
            "numcode"=>"862",
        ) );

        $this->insert("Country", array(
            "id"=>"232",
            "code"=>"VN",
            "namecap"=>"VIET NAM",
            "name"=>"Viet Nam",
            "iso3"=>"VNM",
            "numcode"=>"704",
        ) );

        $this->insert("Country", array(
            "id"=>"233",
            "code"=>"VG",
            "namecap"=>"VIRGIN ISLANDS, BRITISH",
            "name"=>"Virgin Islands, British",
            "iso3"=>"VGB",
            "numcode"=>"92",
        ) );

        $this->insert("Country", array(
            "id"=>"234",
            "code"=>"VI",
            "namecap"=>"VIRGIN ISLANDS, U.S.",
            "name"=>"Virgin Islands, U.s.",
            "iso3"=>"VIR",
            "numcode"=>"850",
        ) );

        $this->insert("Country", array(
            "id"=>"235",
            "code"=>"WF",
            "namecap"=>"WALLIS AND FUTUNA",
            "name"=>"Wallis and Futuna",
            "iso3"=>"WLF",
            "numcode"=>"876",
        ) );

        $this->insert("Country", array(
            "id"=>"236",
            "code"=>"EH",
            "namecap"=>"WESTERN SAHARA",
            "name"=>"Western Sahara",
            "iso3"=>"ESH",
            "numcode"=>"732",
        ) );

        $this->insert("Country", array(
            "id"=>"237",
            "code"=>"YE",
            "namecap"=>"YEMEN",
            "name"=>"Yemen",
            "iso3"=>"YEM",
            "numcode"=>"887",
        ) );

        $this->insert("Country", array(
            "id"=>"238",
            "code"=>"ZM",
            "namecap"=>"ZAMBIA",
            "name"=>"Zambia",
            "iso3"=>"ZMB",
            "numcode"=>"894",
        ) );

        $this->insert("Country", array(
            "id"=>"239",
            "code"=>"ZW",
            "namecap"=>"ZIMBABWE",
            "name"=>"Zimbabwe",
            "iso3"=>"ZWE",
            "numcode"=>"716",
        ) );


        // Data for table 'Languages'
        $this->insert("Languages", array(
            "id"=>"1",
            "name"=>"English",
            "description"=>"English",
        ) );

        $this->insert("Languages", array(
            "id"=>"2",
            "name"=>"French",
            "description"=>"French",
        ) );

        $this->insert("Languages", array(
            "id"=>"3",
            "name"=>"German",
            "description"=>"German",
        ) );

        $this->insert("Languages", array(
            "id"=>"4",
            "name"=>"Chinese",
            "description"=>"Chinese",
        ) );
        
        

    }

    public function down() {
        echo "m150429_145607_data does not support migration down.\n";
        return false;
    }
}
