<iREMBLOCK>

L = (5.5C + 35)X 

Length = ((STR = 11)+((CHR = 11) * LengthToEncode )+(CHK = 11)+(END = 13))

L = length of symbol (not counting quiet zone) 
C = number of data characters, code characters and shift characters (do not include start, stop or checksum. They are automatically added in.)
X = X-dimension

</iREMBLOCK>


<iEQ name="texto" value=":stringToEncode">
<iEQ name="SumLng" value=":chkSum">

<iSET pad="2">

<iEQ name="largo" value=<iEVAL expr='<iSTRLEN SRC=":encodedString"> - 3'>>
<iEQ name="encodLen" value='<iSTRLEN SRC=":stringToEncode">'>

<iEVAL outvar="charLenght" expr="11 + ( 11 * (:encodLen / :pad)) + 11 + 13">

<iSET barStart="10">
<iSET barWidth="2">
<iEVAL expr=":barStart + 70" outvar="barHeight">



<iSET width='<iEVAL expr="(:barWidth * :charLenght) + 80">'>
<iSET height='<iEVAL expr=":width - (:width / 3)">'>


<iIMAGECREATE Name="canvas1" width=":width" height=":height" BGR="255" BGG="255" BGB="255">

<iSET fileName='./barcodes/:encodedString'>
<iSTRCAT src=".gif" dst="fileName">
<iEQ name="path" value='<iSTRLEFT src=":i_path" num=<iMATH A=<iSTRLEN src=':i_path'> B=11 O="-">>'>
<iIF NOTCOND='<iISDEF var="i_path">'>
	<iEQ name="path" value='<iSTRLEFT src=":i_priv_path" num=<iMATH A=<iSTRLEN src=':i_priv_path'> B=11 O="-">>'>
</iIF>


<iSTRLEFT SRC=:encodedString NUM="3" outvar="startCode">
<iSET encodeFile="encoding_:startCode">
<iSTRCAT src=".inc" dst="encodeFile">

<iINCLUDE name="includes/barcode/:encodeFile">

<iREM write start code >
<iSET x1='30'>
<iEQ name="stCode" value=":var_:startCode" EVAL=TRUE>
<iSET stCodeLen=<iSTRLEN src=":stCode">>
<iSET stCodeLena=":stCodeLen">

<iLOOP alias="lp" initial="1" final=":stCodeLen">

	<iSTRLEFT SRC=":stCode" NUM="1" outvar="st">
	<iEVAL expr=":stCodeLena - 1" outvar="stCodeLena">
	<iSET stCode=<iSTRRIGHT src=":stCode" NUM=":stCodeLena">>
	<iSET x1='<iEVAL expr=":x1 + :barWidth">'>
	<iSET x2='<iEVAL expr=":x1 + :barWidth">'>
	<iSET y1=":barStart">
	<iSET y2=":barHeight">
	<iDEFAULT name="st" value="1">
	<iIF COND=":st" alias="bgcolor">
		<iSET color="#000000">
	<iELSE  alias="bgcolor">
		<iSET color="#FFFFFF">
	</iIF alias="bgcolor">
	
	<iIMAGERECT NAME="canvas1" X1=":x1" X2=":x2" Y1=":y1" Y2=":y2" COLOR=":color" STYLE="filled">
</iLOOP alias="lp">


<iREM write content code >

<iLOOP alias="lp" initial="0" final='<iEVAL expr=":largo - 1">'>


	<iEVAL expr=":largo - :lp" outvar="pos">
	<iEVAL expr=":lp + 1" outvar="curr">
	
	
	<iSTRRIGHT SRC=":stringToEncode" NUM=":pos" outvar="sta">
	<iSTRLEFT src=":sta" NUM="2" outvar="string">

	<iEVAL expr=":string" outvar="string">
	<iEVAL expr=":lp + 1" outvar="lp">
	<iEQ name="stString" value=":var_:string" EVAL=TRUE>
	
	<iSET stringToEncodeLen=<iSTRLEN src=":stString">>
	<iSET stringToEncodeLena=":stringToEncodeLen">
	<iLOOP alias="lpi" initial="0" final='<iEVAL expr=":stringToEncodeLen - 1">'>
	
		<iEVAL expr=":stringToEncodeLen - :lpi" outvar="posa">
		<iEVAL expr=":lpi + 1" outvar="curra">
		
		
		<iSTRRIGHT SRC=":stString" NUM=":posa" outvar="staa">
		<iSTRLEFT src=":staa" NUM="1" outvar="stringa">
		
		<iSET x1='<iEVAL expr=":x1 + :barWidth">'>
		<iSET x2='<iEVAL expr=":x1 + :barWidth">'>
		<iSET y1=":barStart">
		<iSET y2=":barHeight">
		<iDEFAULT name="stringa" value="1">
		<iIF COND=":stringa" alias="bgcolor">
			<iSET color="#000000">
		<iELSE  alias="bgcolor">
			<iSET color="#FFFFFF">
		</iIF alias="bgcolor">
		
		<iIMAGERECT NAME="canvas1" X1=":x1" X2=":x2" Y1=":y1" Y2=":y2" COLOR=":color" STYLE="filled">
	</iLOOP alias="lpi">
</iLOOP alias="lp">




<iREM write check code >
<iEQ name="stCode" value=":var_:chkSum" EVAL=TRUE>
<iSET stCodeLen=<iSTRLEN src=":stCode">>
<iSET stCodeLena=":stCodeLen">

<iLOOP alias="lp" initial="1" final=":stCodeLen">
	<iSTRLEFT SRC=":stCode" NUM="1" outvar="st">
	<iEVAL expr=":stCodeLena - 1" outvar="stCodeLena">
	<iSET stCode=<iSTRRIGHT src=":stCode" NUM=":stCodeLena">>
	<iSET x1='<iEVAL expr=":x1 + :barWidth">'>
	<iSET x2='<iEVAL expr=":x1 + :barWidth">'>
	<iSET y1=":barStart">
	<iSET y2=":barHeight">
	<iDEFAULT name="st" value="1">
	<iIF COND=":st" alias="bgcolor">
		<iSET color="#000000">
	<iELSE  alias="bgcolor">
		<iSET color="#FFFFFF">
	</iIF alias="bgcolor">
	
	<iIMAGERECT NAME="canvas1" X1=":x1" X2=":x2" Y1=":y1" Y2=":y2" COLOR=":color" STYLE="filled">
</iLOOP alias="lp">


<iREM write end code >
<iEQ name="stCode" value=":var_106" EVAL=TRUE>
<iSET stCodeLen=<iSTRLEN src=":stCode">>
<iSET stCodeLena=":stCodeLen">

<iLOOP alias="lp" initial="1" final=":stCodeLen">
	<iSTRLEFT SRC=":stCode" NUM="1" outvar="st">
	<iEVAL expr=":stCodeLena - 1" outvar="stCodeLena">
	<iSET stCode=<iSTRRIGHT src=":stCode" NUM=":stCodeLena">>
	<iSET x1='<iEVAL expr=":x1 + :barWidth">'>
	<iSET x2='<iEVAL expr=":x1 + :barWidth">'>
	<iSET y1=":barStart">
	<iSET y2=":barHeight">
	<iDEFAULT name="st" value="1">
	<iIF COND=":st" alias="bgcolor">
		<iSET color="#000000">
	<iELSE  alias="bgcolor">
		<iSET color="#FFFFFF">
	</iIF alias="bgcolor">
	
	<iIMAGERECT NAME="canvas1" X1=":x1" X2=":x2" Y1=":y1" Y2=":y2" COLOR=":color" STYLE="filled">
</iLOOP alias="lp">

<iEVAL expr=":barHeight + 5" outvar="yTextPos">
<iSET textLen='<iSTRLEN src=":texto">'>
<iEVAL expr="(:width / 2)-" outvar="textCenterPos">

<iIMAGETEXT NAME="canvas1" TEXT=":texto" COLOR="#000000" FONT="large" POINTS=48 X=:textCenterPos Y=:yTextPos>
<iIMAGEWRITE NAME="canvas1" FILENAME=":fileName" TYPE="gif">
<IMG SRC=":fileName">
<iIMAGEDESTROY name="canvas1">

<script type="text/javascript">
var t=setTimeout("getValues();",5000)
function getValues()
{
	var url = 'ajax_cleanFile.htm';
	var pars = 'rfr=:i_priv_srv:i_priv_ip&fileName=:fileName';
	
	var myAjax = new Ajax.Request(
		url, 
		{
			method: 'get', 
			parameters: pars,
			evalScripts: true,
			onComplete: stopCount
		}
		);
}
function stopCount()
{
	clearTimeout(t)
}
</script>
