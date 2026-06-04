{
  "Summary": {
    "Customer": "SchwörerHaus",
    "Order_ID": "N/A"
  },
  "Header_Mapping": [
    {
      "Col": 1,
      "Field": "Fixed",
      "Logic": "get datum",
      "if":jdhh,
      "then":jdjj,
      "else":hdhh,
      "Type": "T",
      "Output": ""
    },
    {
      "Col": 2,
      "Field": "Fixed",
      "Logic": "get bestnr",
      "Type": "T",
      "Output": ""
    }
  ],
  "Panzer_Color_Mapping": [
    {
      "Input_Contains": "anthrazit",
      "Output_Result": "Clinton"
    }
  ],
  "Positions_Mapping": [
    {
      "Position_ID": "Sample",
      "Mapping": [
        {
          "Col": 1,
          "Field_option": "Importzeilen-Num",
          "Logic": "+1 for each position",
          "Type": "T",
          "Step":"ja",
          "Output": ""
        }
      ]
    }
  ],
  "History": []
}