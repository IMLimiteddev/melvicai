{
  "status": true,
  "data": {
    "Message": "Mapping documentation for 'SchwörerHaus' updated successfully.",
    "Saved_config_file": "schworer_mapping_config.json",
    "New_mapping_rule": {
      "Summary": {
        "Customer": "SchwörerHaus",
        "Order_ID": "N/A"
      },
      "Header_Mapping": [
        {
          "Col": 1,
          "Field": "Fixed",
          "Logic": "Default: 2145",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 2,
          "Field": "Fixed",
          "Logic": "Default: 55",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 3,
          "Field": "Fixed",
          "Logic": "Default: 55",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 4,
          "Field": "Fixed",
          "Logic": "Default: 55",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 5,
          "Field": "Vom Datum",
          "Logic": "Get Vom Datum from input file",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 6,
          "Field": "KD-Auftrag:",
          "Logic": "Get KD-Auftrag number from the file",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 7,
          "Field": "Bestnr",
          "Logic": "Get Bestnr number from the file",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 8,
          "Field": "Fixed",
          "Logic": "Default: 0",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 9,
          "Field": "Fixed",
          "Logic": "Default: I&M",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 10,
          "Field": "Rollladen Panzer",
          "Logic": "Get Rollladen Panzer color and Match Panzer Color Rules to output color (e.g input tiefschwarz, output Tiefschwarz.368m) Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 11,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 12,
          "Field": "Fehro Führungsschiene",
          "Logic": "Get Fehro Führungsschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 13,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 14,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 15,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 16,
          "Field": "Fixed",
          "Logic": "Default: hwf9016",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 17,
          "Field": "Fixed",
          "Logic": "Default: grau",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 18,
          "Field": "Rollladen/Jalousie Endschiene",
          "Logic": "Get Endschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 19,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 20,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 21,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 22,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 23,
          "Field": "Rollladen/Jalousie Endschiene",
          "Logic": "Get Endschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 24,
          "Field": "Fehro Führungsschiene",
          "Logic": "Get Fehro Führungsschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 25,
          "Field": "Fehro Führungsschiene",
          "Logic": "Get Fehro Führungsschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 26,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 27,
          "Field": "Fixed",
          "Logic": "Default: LKW",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 28,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 29,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 30,
          "Field": "Fixed",
          "Logic": "Default: 0",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 31,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 32,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 33,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 34,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 35,
          "Field": "Revisionsblende",
          "Logic": "Get Revisionsblende color code from the file (e.g hwf9016) else Farbe eintragen. If schwarz is present then put \"schwarz\"",
          "Type": "T",
          "Output": ""
        }
      ],
      "Panzer_Color_Mapping": [
        {
          "Input_Contains": "anthrazit",
          "Output_Result": "Anthrazit"
        },
        {
          "Input_Contains": "beige",
          "Output_Result": "beige"
        },
        {
          "Input_Contains": "graualuminium",
          "Output_Result": "graualuminium"
        },
        {
          "Input_Contains": "grau or lichtgrau",
          "Output_Result": "lichtgrau"
        },
        {
          "Input_Contains": "silber or silberfarbig",
          "Output_Result": "Silber (~RAL 9006)"
        },
        {
          "Input_Contains": "anthrazitgrau.354m",
          "Output_Result": "Anthrazitgrau.354m"
        },
        {
          "Input_Contains": "weiss",
          "Output_Result": "weiss"
        },
        {
          "Input_Contains": "graualuminium.353m",
          "Output_Result": "Graualuminium.353m"
        },
        {
          "Input_Contains": "tiefschwarz",
          "Output_Result": "Tiefschwarz.368m"
        },
        {
          "Input_Contains": "verkehrsweiss.356m",
          "Output_Result": "Verkehrsweiss.356m"
        },
        {
          "Input_Contains": "weissaluminium.360m",
          "Output_Result": "Weissaluminium.360m"
        }
      ],
      "Positions_Mapping": [
        {
          "Position_ID": "Sample",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": ""
            }
          ]
        }
      ]
    },
    "Mapping_report": {
      "Summary": {
        "Customer": "SchwörerHaus",
        "Order_ID": "N/A"
      },
      "Header_Mapping": [
        {
          "Col": 1,
          "Field": "Fixed",
          "Logic": "Default: 2145",
          "Type": "D",
          "Output": "2145"
        },
        {
          "Col": 2,
          "Field": "Fixed",
          "Logic": "Default: 55",
          "Type": "D",
          "Output": "55"
        },
        {
          "Col": 3,
          "Field": "Fixed",
          "Logic": "Default: 55",
          "Type": "D",
          "Output": "55"
        },
        {
          "Col": 4,
          "Field": "Fixed",
          "Logic": "Default: 55",
          "Type": "D",
          "Output": "55"
        },
        {
          "Col": 5,
          "Field": "Vom Datum",
          "Logic": "Get Vom Datum from input file",
          "Type": "T",
          "Output": "19.05.2025"
        },
        {
          "Col": 6,
          "Field": "KD-Auftrag:",
          "Logic": "Get KD-Auftrag number from the file",
          "Type": "T",
          "Output": "46070"
        },
        {
          "Col": 7,
          "Field": "Bestnr",
          "Logic": "Get Bestnr number from the file",
          "Type": "T",
          "Output": "4501465157"
        },
        {
          "Col": 8,
          "Field": "Fixed",
          "Logic": "Default: 0",
          "Type": "D",
          "Output": "0"
        },
        {
          "Col": 9,
          "Field": "Fixed",
          "Logic": "Default: I&M",
          "Type": "D",
          "Output": "I&M"
        },
        {
          "Col": 10,
          "Field": "Rollladen Panzer",
          "Logic": "Get Rollladen Panzer color and Match Panzer Color Rules to output color (e.g input tiefschwarz, output Tiefschwarz.368m) Farbe eintragen",
          "Type": "T",
          "Output": "Anthrazit"
        },
        {
          "Col": 11,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 12,
          "Field": "Fehro Führungsschiene",
          "Logic": "Get Fehro Führungsschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": "hwf7016"
        },
        {
          "Col": 13,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 14,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 15,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 16,
          "Field": "Fixed",
          "Logic": "Default: hwf9016",
          "Type": "D",
          "Output": "hwf9016"
        },
        {
          "Col": 17,
          "Field": "Fixed",
          "Logic": "Default: grau",
          "Type": "D",
          "Output": "grau"
        },
        {
          "Col": 18,
          "Field": "Rollladen/Jalousie Endschiene",
          "Logic": "Get Endschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": "hwf7016"
        },
        {
          "Col": 19,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 20,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 21,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 22,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 23,
          "Field": "Rollladen/Jalousie Endschiene",
          "Logic": "Get Endschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 24,
          "Field": "Fehro Führungsschiene",
          "Logic": "Get Fehro Führungsschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": "hwf7016"
        },
        {
          "Col": 25,
          "Field": "Fehro Führungsschiene",
          "Logic": "Get Fehro Führungsschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": "hwf7016"
        },
        {
          "Col": 26,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": "hwf7016"
        },
        {
          "Col": 27,
          "Field": "Fixed",
          "Logic": "Default: LKW",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 28,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": "LKW"
        },
        {
          "Col": 29,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 30,
          "Field": "Fixed",
          "Logic": "Default: 0",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 31,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": "0"
        },
        {
          "Col": 32,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 33,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 34,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 35,
          "Field": "Revisionsblende",
          "Logic": "Get Revisionsblende color code from the file (e.g hwf9016) else Farbe eintragen. If schwarz is present then put \"schwarz\"",
          "Type": "T",
          "Output": ""
        }
      ],
      "Panzer_Color_Mapping": [
        {
          "Input_Contains": "anthrazit",
          "Output_Result": "Anthrazit"
        },
        {
          "Input_Contains": "beige",
          "Output_Result": "beige"
        },
        {
          "Input_Contains": "graualuminium",
          "Output_Result": "graualuminium"
        },
        {
          "Input_Contains": "grau or lichtgrau",
          "Output_Result": "lichtgrau"
        },
        {
          "Input_Contains": "silber or silberfarbig",
          "Output_Result": "Silber (~RAL 9006)"
        },
        {
          "Input_Contains": "anthrazitgrau.354m",
          "Output_Result": "Anthrazitgrau.354m"
        },
        {
          "Input_Contains": "weiss",
          "Output_Result": "weiss"
        },
        {
          "Input_Contains": "graualuminium.353m",
          "Output_Result": "Graualuminium.353m"
        },
        {
          "Input_Contains": "tiefschwarz",
          "Output_Result": "Tiefschwarz.368m"
        },
        {
          "Input_Contains": "verkehrsweiss.356m",
          "Output_Result": "Verkehrsweiss.356m"
        },
        {
          "Input_Contains": "weissaluminium.360m",
          "Output_Result": "Weissaluminium.360m"
        }
      ],
      "Positions_Mapping": [
        {
          "Position_ID": "00010",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1146"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "706"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "10"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00020",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "756"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2226"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "20"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00030",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "3"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2226"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "30"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00040",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "4"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2226"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "40"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00050",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2226"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "50"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00060",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "6"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2226"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "60"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00070",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "7"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2186"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "24"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "70"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00080",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "8"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "756"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2226"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "80"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00090",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "8"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "3021"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2186"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "90"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00100",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "10"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "756"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2226"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "100"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00110",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "11"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1146"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "706"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "110"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00120",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "12"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "756"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2106"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "120"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00130",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2106"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "130"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00140",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "14"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2106"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "140"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00150",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "15"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "1636"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "150"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00160",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "16"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2106"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "160"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00170",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "17"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2106"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "24"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "170"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00180",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "18"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2026"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "180"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00190",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "19"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "1458"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "2106"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "190"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00200",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "20"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": "2396"
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": "706"
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": "23"
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": "13"
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": "9"
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "200"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "2"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "1"
            }
          ]
        },
        {
          "Position_ID": "00240",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": "21"
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": "5"
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": "1"
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "Ja"
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": "0"
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": "240"
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "1"
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": "0"
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": "0"
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": "0"
            }
          ]
        }
      ]
    },
    "Processed_file": "D & M KG-460704501465157.pdf",
    "Parsed_structure_file": "D & M KG-460704501465157_parsed_structure.json",
    "Submitted_config_file": "D & M KG-460704501465157_submitted_mapping_rule.json",
    "Submitted_config_json": {
      "Summary": {
        "Customer": "SchwörerHaus",
        "Order_ID": "N/A"
      },
      "Header_Mapping": [
        {
          "Col": 1,
          "Field": "Fixed",
          "Logic": "Default: 2145",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 2,
          "Field": "Fixed",
          "Logic": "Default: 55",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 3,
          "Field": "Fixed",
          "Logic": "Default: 55",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 4,
          "Field": "Fixed",
          "Logic": "Default: 55",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 5,
          "Field": "Vom Datum",
          "Logic": "Get Vom Datum from input file",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 6,
          "Field": "KD-Auftrag:",
          "Logic": "Get KD-Auftrag number from the file",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 7,
          "Field": "Bestnr",
          "Logic": "Get Bestnr number from the file",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 8,
          "Field": "Fixed",
          "Logic": "Default: 0",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 9,
          "Field": "Fixed",
          "Logic": "Default: I&M",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 10,
          "Field": "Rollladen Panzer",
          "Logic": "Get Rollladen Panzer color and Match Panzer Color Rules to output color (e.g input tiefschwarz, output Tiefschwarz.368m) Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 11,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 12,
          "Field": "Fehro Führungsschiene",
          "Logic": "Get Fehro Führungsschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 13,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 14,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 15,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 16,
          "Field": "Fixed",
          "Logic": "Default: hwf9016",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 17,
          "Field": "Fixed",
          "Logic": "Default: grau",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 18,
          "Field": "Rollladen/Jalousie Endschiene",
          "Logic": "Get Endschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 19,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 20,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 21,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 22,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 23,
          "Field": "Rollladen/Jalousie Endschiene",
          "Logic": "Get Endschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 24,
          "Field": "Fehro Führungsschiene",
          "Logic": "Get Fehro Führungsschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 25,
          "Field": "Fehro Führungsschiene",
          "Logic": "Get Fehro Führungsschiene color code from the file (e.g hwf9016) else Farbe eintragen",
          "Type": "T",
          "Output": ""
        },
        {
          "Col": 26,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 27,
          "Field": "Fixed",
          "Logic": "Default: LKW",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 28,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 29,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 30,
          "Field": "Fixed",
          "Logic": "Default: 0",
          "Type": "D",
          "Output": ""
        },
        {
          "Col": 31,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 32,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 33,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 34,
          "Field": "Empty",
          "Logic": "",
          "Type": "E",
          "Output": ""
        },
        {
          "Col": 35,
          "Field": "Revisionsblende",
          "Logic": "Get Revisionsblende color code from the file (e.g hwf9016) else Farbe eintragen. If schwarz is present then put \"schwarz\"",
          "Type": "T",
          "Output": ""
        }
      ],
      "Panzer_Color_Mapping": [
        {
          "Input_Contains": "anthrazit",
          "Output_Result": "Anthrazit"
        },
        {
          "Input_Contains": "beige",
          "Output_Result": "beige"
        },
        {
          "Input_Contains": "graualuminium",
          "Output_Result": "graualuminium"
        },
        {
          "Input_Contains": "grau or lichtgrau",
          "Output_Result": "lichtgrau"
        },
        {
          "Input_Contains": "silber or silberfarbig",
          "Output_Result": "Silber (~RAL 9006)"
        },
        {
          "Input_Contains": "anthrazitgrau.354m",
          "Output_Result": "Anthrazitgrau.354m"
        },
        {
          "Input_Contains": "weiss",
          "Output_Result": "weiss"
        },
        {
          "Input_Contains": "graualuminium.353m",
          "Output_Result": "Graualuminium.353m"
        },
        {
          "Input_Contains": "tiefschwarz",
          "Output_Result": "Tiefschwarz.368m"
        },
        {
          "Input_Contains": "verkehrsweiss.356m",
          "Output_Result": "Verkehrsweiss.356m"
        },
        {
          "Input_Contains": "weissaluminium.360m",
          "Output_Result": "Weissaluminium.360m"
        }
      ],
      "Positions_Mapping": [
        {
          "Position_ID": "Sample",
          "Mapping": [
            {
              "Col": 1,
              "Field": "Importzeilen-Num",
              "Logic": "Importzeilen-Num (1, 2, 3...): +1",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 2,
              "Field": "Kernwand",
              "Logic": "if Zeichnungsnummer is 4921, 4996, 5025, or 5026; put \"7\"if Zeichnungsnummer is 4709, 4715, 5251, or 5252; put \"13\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 3,
              "Field": "Geschoß",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 4,
              "Field": "Fensterart",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 5,
              "Field": "Fenstergeometrie",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 6,
              "Field": "Fensteraufteilung",
              "Logic": "If Antriebsseite is 'links' or 'rechts' then put \"1\"If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (linke, rechte) then put 55If Antriebsseite in (links, rechts) and Insektenschutzrollo: Ja and Bemerkung in (li + re, re + li) then put 25If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003C= 2396 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003C= 4000 then put 2If Antriebsseite: Beidseitig and Zeichnungsnummer in (4709, 4921, 5025, 5026, 5251) and Breite \u003E 2396 then put 8If Antriebsseite: Beidseitig and Zeichnungsnummer in (4715, 4996, 5252) and Breite \u003E 4000 then put 8",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 7,
              "Field": "Material FS",
              "Logic": "Default: \"5\"If Insektenschutzrollo: Ja then put \"6\"If Zeichnungsnummer is 5251 then put \"9\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 8,
              "Field": "Maßbezug",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 9,
              "Field": "Fenstertyp-Beschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 10,
              "Field": "Positionsbeschreibung",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 11,
              "Field": "Breite",
              "Logic": "Value for Breite in file",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 12,
              "Field": "Höhe",
              "Logic": "Value for Höhe in file",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 13,
              "Field": "Bedienung links",
              "Logic": "Default: 1If Antriebsseite: links then \"1\"If Antriebsseite: rechts then \"0\"If Notkurbel: links then \"1\"If Notkurbel: rechts then \"0\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 14,
              "Field": "Bedienung rechts",
              "Logic": "Default: 0If Antriebsseite: links then \"0\"If Antriebsseite: rechts then \"1\"If Notkurbel: links then \"0\"If Notkurbel: rechts then \"1\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 15,
              "Field": "Ausführung Standard",
              "Logic": "Fixed Default: Ja",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 16,
              "Field": "Preis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 17,
              "Field": "Konstruktion",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"2\"If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"37\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 18,
              "Field": "idBehangtyp",
              "Logic": "If 'CDL' in InitialBeschreibung then '103'If 'DBL70' in InitialBeschreibung then '99'If 'DM40' in InitialBeschreibung then '2'",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 19,
              "Field": "Antrieb",
              "Logic": "Default: \"0\"If Motor Becker E03 - Kurzmotor then '25'If Motor Becker E03 then '23'If Motor Becker E22 mit NHK-Kit3 then '24'If Funk Motor I/O RS100 +NHK-Kit2 then '19'If Funk Motor I/O RS100 then '13'If Motor Oximo WT mit NHK-Kit2 then '17'If Motor Oximo 1/0 or Funk Motor: 1/0 J4 io Protect then '11'If Motor Elero JA Soft or Motor Ilmo then '6'If Kurbel abnehmbar then '5'If Motor CBshort then '26'",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 20,
              "Field": "Länge Bedelem.",
              "Logic": "Empty",
              "Type": "E",
              "Output": ""
            },
            {
              "Col": 21,
              "Field": "Wand 2 (Awand)",
              "Logic": "If Zeichnungsnummer in (4709, 4715, 5252) then put \"13\"If Zeichnungsnummer in (4921, 4996) then put \"9\"If Zeichnungsnummer is 5052 then put \"8\"If Zeichnungsnummer is 5026 then put \"3\"If Zeichnungsnummer is 5251 then put \"33\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 22,
              "Field": "Wand 3 (Iwand)",
              "Logic": "If Zeichnungsnummer in (4921, 4996, 5025, 5026) then put \"6\"If Zeichnungsnummer in (4709, 4715, 5251, 5252) then put \"9\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 23,
              "Field": "Einzelteil-Typ",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 24,
              "Field": "Einzelteil-Art",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 25,
              "Field": "Einzelteil-Anzahl",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 26,
              "Field": "Einzelteil-Farbe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 27,
              "Field": "Einzelteil-Länge(Breite)",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 28,
              "Field": "Einzelteil-Höhe",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 29,
              "Field": "Einzelteil-Besonderheit",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 30,
              "Field": "Einzelteilpreis",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 31,
              "Field": "Positionsnummer",
              "Logic": "The POS number from the file",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 32,
              "Field": "Fensteröffnung",
              "Logic": "Fixed Default: 1",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 33,
              "Field": "Kombipos1",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 34,
              "Field": "Asymmetrisch",
              "Logic": "Default: \"0\"If Asymmetrisch matches '1/(\\d+)' and 'links' in text then calculate (Breite / denominator)If 'rechts' in text then calculate (Breite / denominator * 2)",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 35,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 36,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 37,
              "Field": "ISS Konstruktion",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja then put \"1\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 38,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 39,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 40,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 41,
              "Field": "ISS Bedienung links",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: links then put \"1\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 42,
              "Field": "ISS Bedienung rechts",
              "Logic": "Default: \"0\"If Insektenschutzrollo: Ja and Antriebsseite: rechts then put \"1\"",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 43,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 44,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 45,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 46,
              "Field": "",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 47,
              "Field": "Mehrpreis-Art",
              "Logic": "Default: \"0\"If Abschnittwinkel is '0' then '9'If Abschnittwinkel is '5' then '2'",
              "Type": "T",
              "Output": ""
            },
            {
              "Col": 48,
              "Field": "Schallschutz",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 49,
              "Field": "Platzhalter",
              "Logic": "Fixed: Empty",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 50,
              "Field": "Platzhalter",
              "Logic": "Fixed Default: 0",
              "Type": "D",
              "Output": ""
            },
            {
              "Col": 51,
              "Field": "ReviblendeArt",
              "Logic": "Default: \"1\"If Insektenschutzrollo: Ja or Revisionblende has kunststoff then '2'If InitialBeschreibung has raffstoresystem then '0'",
              "Type": "T",
              "Output": ""
            }
          ]
        }
      ]
    },
    "Generated_text_file": "D & M KG-460704501465157_generated_mapping.txt",
    "Generated_json_file": "D & M KG-460704501465157_generated_mapping.json"
  }
}