{
"Summary": {
"Customer": "SchwörerHaus",
"Order_ID": "N/A"
},

"Header_Mapping": [
{
"Col": 5,
"Field": "Vom Datum",
"If": "contains 'vom'",
"Then": "extract date in DD.MM.YYYY format",
"Else": "",
"Type": "T"
},
{
"Col": 6,
"Field": "KD-Auftrag",
"If": "contains 'KD-Auftrag'",
"Then": "extract number after KD-Auftrag",
"Else": "",
"Type": "T"
}
],

"Panzer_Color_Mapping": [
{
"Input_Contains": "weißaluminium",
"Output_Result": "hwf9006"
},
{
"Input_Contains": "anthrazit",
"Output_Result": "hwf7016"
}
],

"Positions_Mapping": [
{
"Position_ID": "Sample",
"Mapping": [
{
"Col": 1,
"Field": "Pos",
"Ifs": [
{
"If": "contains 'Pos.'",
"Then": "extract number after 'Pos.'"
}
],
"Else": "",
"Type": "T"
},
{
"Col": 2,
"Field": "Art",
"Ifs": [
{
"If": "contains 'Raffstoresystem'",
"Then": "13"
},
{
"If": "contains 'Raffstore'",
"Then": "13"
},
{
"If": "contains 'Rollladen'",
"Then": "7"
}
],
"Else": "0",
"Type": "T"
}
]
}
]
}
