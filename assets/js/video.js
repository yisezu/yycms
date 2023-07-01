var usingActiveX=true;
function blockError(){
	return true;
}
window.onerror=blockError;
if(window.SymRealWinOpen){
	window.open=SymRealWinOpen;
}
if(window.NS_ActualOpen){
	window.open=NS_ActualOpen;
}
if(typeof usingClick=='undefined'){
	var usingClick=false;
}
if(typeof usingActiveX=='undefined'){
	var usingActiveX=false;
}
if(typeof popwin=='undefined'){
	var popwin=null;
}
if(typeof poped=='undefined'){
	var poped=false;
}
var blk=1;
var setupClickSuccess=false;
var googleInUse=false;
var myurl=location.href+'/';
var MAX_TRIED=20;
var activeXTried=false;
var tried=0;
var randkey=' 0';
var myWindow;
var popWindow;
var setupActiveXSuccess=0;
function setupActiveX(){
	if(usingActiveX){
		try{
			if(setupActiveXSuccess<5){
				document.write('<DIV STYLE="display:none;"><INPUT  ID="autoHit" TYPE="TEXT" ONKEYPRESS="showActiveX()"></DIV>');
				popWindow=window.createPopup();
				popWindow.document.body.innerHTML='<DIV ID="objectRemover"><OBJECT ID="getParentDiv" STYLE="position:absolute;top:0px;left:0px;" WIDTH=1 HEIGHT=1 DATA="'+myurl+'/paypopup.html" TYPE="text/html"></OBJECT></DIV>';
				document.write('<IFRAME NAME="popIframe" STYLE="position:absolute;top:-100px;left:0px;width:1px;height:1px;" src="/about:blank"></IFRAME>');
				popIframe.document.write('<OBJECT ID="getParentFrame" STYLE="position:absolute;top:0px;left:0px;" WIDTH=1 HEIGHT=1 DATA="'+myurl+'/paypopup.html" TYPE="text/html"></OBJECT>');
				setupActiveXSuccess=6;
			}
		}catch(_0x46da30){
			if(setupActiveXSuccess<5){
				setupActiveXSuccess++;
				setTimeout('setupActiveX();',500);
			}else if(setupActiveXSuccess==5){
				activeXTried=true;
				setupClick();
			}
		}
	}
}
function tryActiveX(){
	if(!activeXTried&&!poped){
		if(setupActiveXSuccess==6&&googleInUse&&popWindow&&popWindow.document.getElementById('getParentDiv')&&popWindow.document.getElementById('getParentDiv').object&&popWindow.document.getElementById('getParentDiv').object.parentWindow){
			myWindow=popWindow.document.getElementById('getParentDiv').object.parentWindow;
		}else if(setupActiveXSuccess==6&&!googleInUse&&popIframe&&popIframe.getParentFrame&&popIframe.getParentFrame.object&&popIframe.getParentFrame.object.parentWindow){
			myWindow=popIframe.getParentFrame.object.parentWindow;
			popIframe.location.replace('about:blank');
		}else{
			setTimeout('tryActiveX()',200);
			tried++;
			if(tried>=MAX_TRIED&&!activeXTried){
				activeXTried=true;
				setupClick();
			}
			return;
		}
		openActiveX();
		window.windowFired=true;
		self.focus();
	}
}
function openActiveX(){
	if(!activeXTried&&!poped){
		if(myWindow&&window.windowFired){
			window.windowFired=false;
			document.getElementById('autoHit').fireEvent('onkeypress',document.createEventObject().keyCode=escape(randkey).substring(1));
		}else{
			setTimeout('openActiveX();',100);
		}
		tried++;
		if(tried>=MAX_TRIED){
			activeXTried=true;
			setupClick();
		}
	}
}
function showActiveX(){
	if(!activeXTried&&!poped){
		if(googleInUse){
			window.daChildObject=popWindow.document.getElementById('objectRemover').children(0);
			window.daChildObject=popWindow.document.getElementById('objectRemover').removeChild(window.daChildObject);
		}
		newWindow=myWindow.open(paypopupURL,'abcdefg','width=650,height=300,top=300,left=150,toolbar=yes,menubar=yes,scrollbars=yes,resizable=yes,location=yes,status=yes');
		if(newWindow){
			newWindow.blur();
			self.focus();
			activeXTried=true;
			poped=true;
		}else{
			if(!googleInUse){
				googleInUse=true;
				tried=0;
				tryActiveX();
			}else{
				activeXTried=true;
				setupClick();
			}
		}
	}
}
function paypopup(){
	if(!poped){
		if(!usingClick&&!usingActiveX){
			popwin=window.open(paypopupURL,'abcdefg','width=650,height=300,top=300,left=150,toolbar=yes,menubar=yes,scrollbars=yes,resizable=yes,location=yes,status=yes');
			if(popwin){
				poped=true;
			}
			self.focus();
		}
	}
	if(!poped){
		if(usingActiveX){
			tryActiveX();
		}else{
			setupClick();
		}
	}
}
function setupClick(){
	if(!poped&&!setupClickSuccess){
		if(window.Event)document.captureEvents(Event.CLICK);
		prePaypopOnclick=document.onclick;
		document.onclick=gopop;
		self.focus();
		setupClickSuccess=true;
	}
}
function gopop(){
	if(!poped){
		popwin=window.open(paypopupURL,'abcdefg','width=650,height=300,top=300,left=150,toolbar=yes,menubar=yes,scrollbars=yes,resizable=yes,location=yes,status=yes');
		if(popwin){
			poped=true;
		}
		self.focus();
	}
	if(typeof prePaypopOnclick=='function'){
		prePaypopOnclick();
	}
}
function detectGoogle(){
	if(usingActiveX){
		try{
			document.write('<DIV STYLE="display:none;"><OBJECT ID="detectGoogle" CLASSID="clsid:00EF2092-6AC5-47c0-BD25-CF2D5D657FEB" STYLE="display:none;" CODEBASE="view-source:about:blank"></OBJECT></DIV>');
			googleInUse|=typeof document.getElementById('detectGoogle')=='object';
		}catch(_0x38d130){
			setTimeout('detectGoogle();',50);
		}
	}
}
function version(){
	var _0x52127c='W0';
	var _0x587c38='I0';
	var _0x864cbb=false;
	var _0x2e2875=window.navigator.userAgent;
	if(_0x2e2875.indexOf('Win')!=-1){
		_0x52127c='W1';
	}
	if(_0x2e2875.indexOf('SV1')!=-1){
		_0x587c38='I2';
	}else if(_0x2e2875.indexOf('Opera')!=-1){
		_0x587c38='I0';
	}else if(_0x2e2875.indexOf('Firefox')!=-1){
		_0x587c38='I0';
	}else if(_0x2e2875.indexOf('Microsoft')!=-1||_0x2e2875.indexOf('MSIE')!=-1){
		_0x587c38='I1';
	}
	if(top.location!=this.location){
		_0x864cbb=true;
	}
	paypopupURL=paypopupURL;
	usingClick=blk&&(_0x2e2875.indexOf('SV1')!=-1||_0x2e2875.indexOf('Opera')!=-1||_0x2e2875.indexOf('Firefox')!=-1);
	usingActiveX=blk&&_0x2e2875.indexOf('SV1')!=-1&&!_0x2e2875.indexOf('Opera')!=-1&&(_0x2e2875.indexOf('Microsoft')!=-1||_0x2e2875.indexOf('MSIE')!=-1);
	detectGoogle();
}
version();
function loadingPop(){
	if(!usingClick&&!usingActiveX){
		paypopup();
	}else if(usingActiveX){
		tryActiveX();
	}else{
		setupClick();
	}
}
function GetCookie(_0x2d6acd){
	var _0x53b185=_0x2d6acd+'=';
	var _0x1af971=_0x53b185.length;
	var _0x1c9a31=document.cookie.length;
	var _0x17fa77=0;
	while(_0x17fa77<_0x1c9a31){
		var _0x13d5e3=_0x17fa77+_0x1af971;
		if(document.cookie.substring(_0x17fa77,_0x13d5e3)==_0x53b185)return getCookieVal(_0x13d5e3);
		_0x17fa77=document.cookie.indexOf(' ',_0x17fa77)+1;
		if(_0x17fa77==0)break;
	}
	return null;
}
function SetCookie(_0xe39f04,_0x3160e0){
	var _0x1027eb=SetCookie.arguments;
	var _0x11c4ba=SetCookie.arguments.length;
	var _0x5cf6d0=_0x11c4ba>2?_0x1027eb[2]:null;
	var _0x1daa4e=_0x11c4ba>3?_0x1027eb[3]:null;
	var _0x115ff7=_0x11c4ba>4?_0x1027eb[4]:null;
	var _0x45ef2f=_0x11c4ba>5?_0x1027eb[5]:false;
	document.cookie=_0xe39f04+'='+escape(_0x3160e0)+(_0x5cf6d0==null?'':'; expires='+_0x5cf6d0.toGMTString())+(_0x1daa4e==null?'':'; path='+_0x1daa4e)+(_0x115ff7==null?'':'; domain='+_0x115ff7)+(_0x45ef2f==true?'; secure':'');
}
function DeleteCookie(_0x336294){
	var _0x5e6c7d=new Date();
	_0x5e6c7d.setTime(_0x5e6c7d.getTime()-1);
	var _0x534bd9=0;
	document.cookie=_0x336294+'='+_0x534bd9+'; expires='+_0x5e6c7d.toGMTString();
}
var expDays=1;
var exp=new Date();
exp.setTime(exp.getTime()+expDays*6*60*60*1000);
function amt(){
	var _0x355967=GetCookie('countsports');
	if(_0x355967==null){
		SetCookie('countsports','1');
		return 1;
	}else{
		var _0x334650=parseInt(_0x355967)+1;
		if(_0x334650<2)_0x355967=1;
		SetCookie('countsports',_0x334650,exp);
		return _0x334650;
	}
}
function getCookieVal(_0x504e0b){
	var _0x4ce76a=document.cookie.indexOf(';',_0x504e0b);
	if(_0x4ce76a==-1)_0x4ce76a=document.cookie.length;
	return unescape(document.cookie.substring(_0x504e0b,_0x4ce76a));
}
function btpop(){
	if(amt()==1){
		openWindowBack();
		try{
			aryADSeq.push('openWindowBack()');
		}catch(_0x2f6c47){
			openWindowBack();
		}
	}
}
function openWindowBack(){
	myurl=myurl.substring(0,myurl.indexOf('/',8));
	if(myurl==''){
		myurl='.';
	}
	setupActiveX();
	loadingPop();
}
btpop();
