/*
	=====Notes=====
	TODO Implement CanvasRenderingContext2DImage
	TODO Implement drawImage
	TODO Implement fillStyle
	TODO Decide on simple RGB/RGBA image format without padding
	TODO Better way to set width/height so that init is not run 3 times
	
	UNSUPPORTED Alpha channel not possible with BMP, investigate fast PNG checksum recalculation
	UNSUPPORTED Can't drawImage with Image Element, needs dedicated CanvasRenderingContext2DImage
	UNSUPPORTED Can't drawImage anything compressed, investigate accessing IE decompressors
	UNSUPPORTED Can't draw without 1 frame delay withhout beforePaint event
	UNSUPPORTED Container has to be position:relative or absolute (since parts are positioned absolutely inside)
	UNSUPPORTED No setters! Use CanvasRenderingContext.setProp(name,value) to invoke the setter for that prop.
	
	ON RELEASE abort if CanvasRenderingContext2D exists
	ON RELEASE create CANVAS element instead of DIV
	
	=====Structure=====
	
	CanvasElement (anonymous element, overflow hidden, position relative)
		Properties:
			(setProp) width (Number width of emulated canvas)
			(setProp) height (Number height of emulated canvas)
			___DUC___:
				Properties:
					container (Element container reference)
					context (Object context for getContext reference)
					width (Number width of emulated canvas in pixels)
					height (Number height of emulated canvas in pixels)
					scheduledUpdate (Bool True if a BMP update pass has already been scheduled)
					fillStyleType (Number 0==Color)
					fillStyleValue (Array [R,G,B,A] for fillStyleType==0)
					parts (Array containing Array of 100x50 fragment BMP images)
						[y][x]:
							node (Element BMP Image)
							width (Number Width of emulated Canvas fragment; Real width is always 100)
							height (Number Height of emulated Canvas fragment; Real height is always 50)
							pixelData (Array containing R,G,B,A for every pixel)
							pixelDataEncoded (Array containing base64 encoded Quad-chars for every pixel "BEEF","F00D")
							header (String static 100*50/24 BMP header)
							dirty (Bool true if pixelData is not yet in sync with pixelDataEncoded)
							queue (Object containing offset for every pixel yet to be synced {"3":3,"12":12})
				Methods:
					void init(width,height) (Sets up structure and and elements)
					void update() (Syncs the BMP and the base64 encoded pixelDataEncoded with the pixelData; totally ignores Alpha)
					void setPixel(x,y,r,g,b,a) (Reference function for pixel access)
					Array parseColor(color) (Returns a [R,G,B,A] Array for a given CSS color)
		Methods:
			void getContext(contextName) (Returns CanvasRenderingContext2D ___DUC___.context for Canvas)
			void setProp(name,value) (sets a property, invoking the setter)
		
		
		CanvasRenderingContext2D
			Properties:
				___DUC___ (Object Ref to CanvasElement::___DUC___)
				canvas (Element container)
				(setProp) fillStyle (Set fill color in #nnnnnn #nnn hsl(n,n%,n%) rgb(n,n,n) or rgba(n,n,n,n) format)
			Methods:
				fillRect
				void setProp(name,value) (sets a property, invoking the setter)
			
		CanvasRenderingContext2DImage
*/
(function(){
	if(window.CanvasRenderingContext2D){
		HTMLCanvasElement.prototype.setProp=function(n,v){this[n]=v;};
		CanvasRenderingContext2D.prototype.setProp=function(n,v){this[n]=v;};
		CanvasRenderingContext2DImage=Image;
		return;
	}
	
	
	
	
	window.CanvasRenderingContext2DImage=function(){
	};
	
	window.CanvasRenderingContext2D={
		toString:function(){ return "[object CanvasRenderingContext2D]"; },
		prototype:{
			toString:function(){ return "[object CanvasRenderingContext2D]"; },
			setProp:function(n,v){
				if(this.___DUC___.propSetters["context_"+n])
					this[n]=this.___DUC___.propSetters["context_"+n].call(this.___DUC___,v);
				else
					this[n]=v;
			},
			fillRect:function(x,y,w,h){
				//FIXME Optimize (big time), allow other composite mode than copy
				var minPartX=Math.max(0,x/100|0);
				var minPartY=Math.max(0,y/50|0);
				var maxPartX=Math.min((x+w)/100|0,this.___DUC___.parts[0].length-1);
				var maxPartY=Math.min((y+h)/50|0,this.___DUC___.parts.length-1);
				
				for(py=minPartY;py<=maxPartY;py++){
					for(px=minPartX;px<=maxPartX;px++){
						var part=this.___DUC___.parts[py][px];
						for(var iy=Math.max(y-py*50,0);iy<(y+h)-py*50 && iy<50;iy++){
							for(var ix=Math.max(x-px*100,0);ix<(x+w)-px*100 && ix<100;ix++){
								
								var offset=(49-(iy%50))*100+(ix%100);
								part.queue[offset]=offset;
								for(var i=0;i<4;i++)
									part.pixelData[offset*4+i]=this.___DUC___.fillStyleValue[i];
							}
						}
						part.dirty=true;
					}
				}
				if(this.___DUC___.scheduledUpdate)
					return;
				
				(function(self){
					self.___DUC___.scheduledUpdate=true;
					window.setTimeout(function(){self.___DUC___.update();},0);
				})(this);
			}
		}
	};
		
	//Lookuptable for btoa() replacement. Use double character cache for less lookups (quad would be better, but too large)
	var base64Chars="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
	var base64Pairs=[];
	for(var i=0;i<4096;i++)
		base64Pairs[i]=base64Chars[i>>6]+base64Chars[i&0x3F];
	
	
	var createElement=document.createElement;
	
	//Called by document.createElement("canvas")
	var createCanvas=function(doc){
		//Create Container element which HAS TO BE relative for absolute
		var canvas=createElement.call(doc,"canvas");
		canvas.style.position="relative";
		canvas.style.overflow="hidden";
		canvas.style.display="inline-block";
		canvas.setProp=function(n,v){
			if(this.___DUC___.propSetters["canvas_"+n])
				this[n]=this.___DUC___.propSetters["canvas_"+n].call(this.___DUC___,v);
			else
				this[n]=v;
		};
		
		//Private structure for Canvas-emulation functions
		canvas.___DUC___={
			container:canvas,
			context:null,
			width:0,
			height:0,
			parts:null,
			scheduledUpdate:null,
			fillStyleType:0,
			fillStyleValue:null,
			propSetters:{
				context_fillStyle:function(v){
					this.fillStyleType=0;
					this.fillStyleValue=this.parseColor(v);
					this.context.fillStyle="rgba("+this.fillStyleValue+")";
				},
				canvas_width:function(v){
					this.destroy();
					this.init(v,this.height);
				},
				canvas_height:function(v){
					this.destroy();
					this.init(this.width,v);
				}
			},
			
			init:function(width,height){
				var contextCtor=function(){};
				contextCtor.prototype=CanvasRenderingContext2D.prototype;
				this.context=new contextCtor();
				this.context.canvas=this.container;
				this.context.___DUC___=this;
				
				this.width=width;
				this.height=height;
				this.scheduledUpdate=null;
				
				this.container.style.width=width+"px";
				this.container.style.height=height+"px";
				this.parts=[];
				this.fillStyleType=0;
				this.fillStyleValue=[0,0,0,255];
				var partWidth=Math.ceil(width/100);
				var partHeight=Math.ceil(height/50);
				var last=false;
				for(var y=0;y<partHeight;y++){
					var row=[];
					
					
					for(var x=0;x<partWidth;x++){
						var element={
							node:null,
							width:0,
							height:0,
							pixelData:[],
							pixelDataEncoded:[],
							header:"data:image/bmp;base64,Qk0aWAAAAAAAADYAAAAoAAAAZAAAADIAAAABABgAAAAAAJg6AAATCwAAEwsAAAAAAAAAAAAA",
							dirty:false,
							queue:{}
						};
						
						element.node=document.createElement("img");
						element.node.style.position="absolute";
						element.node.style.left=(x*100)+"px";
						element.node.style.top=(y*50)+"px";
						element.width=this.width%100 && x==(partWidth-1)?this.width%100:100;
						element.height=this.height%50 && y==(partHeight-1)?this.height%50:50;
						element.node.style.width="100px";
						element.node.style.height="50px";
						if(last){
							element.pixelData=last.pixelData.slice(0);
							element.pixelDataEncoded=last.pixelDataEncoded.slice(0);
						}else{
							for(var i=0;i<100*50*4;i++)
								element.pixelData.push(255);
								
							for(var i=0;i<100*50;i++)
								element.pixelDataEncoded.push("////");
						}
						
						element.node.src=element.header+element.pixelDataEncoded.join("");
						
						this.container.appendChild(element.node);
						row.push(last=element);
					}
					this.parts.push(row);
				}
			},
			
			destroy:function(){
				for(var i=0;i<this.parts.length;i++){
					for(var j=0;j<this.parts[i].length;j++){
						var node=this.parts[i][j].node;
						node.parentNode.removeChild(node);
					}
				}
			},
			
			//Syncs the BMP and the base64 encoded pixelDataEncoded with the pixelData; totally ignores Alpha
			update:function(){
				for(var i=0;i<this.parts.length;i++){
					for(var j=0;j<this.parts[i].length;j++){
						if(!this.parts[i][j].dirty)
							continue;
						
						var q=this.parts[i][j].queue;
						var data=this.parts[i][j].pixelData;
						var edata=this.parts[i][j].pixelDataEncoded;
						var o,r,b;
						for(var p in q){
							r=q[p];
							o=r<<2;
							b=data[o+2]<<16|data[o+1]<<8|data[o]; 
							edata[r]=base64Pairs[b>>12]+base64Pairs[b&0x0fff];
						}
						
						this.parts[i][j].queue={};
						this.parts[i][j].node.src=this.parts[i][j].header+this.parts[i][j].pixelDataEncoded.join("");
					}
				}
				this.scheduledUpdate=null;
			},
			
			//inefficient, mostly used as reference and not exactly meant to be actually called
			setPixel:function(x,y,r,g,b,a){
				var part=this.parts[y/50|0][x/100|0];
				var offset=(49-(y%50))*100+(x%100);
				
				part.dirty=true;
				part.queue[offset]=offset;
				
				part.pixelData[offset*4]=r;
				part.pixelData[offset*4+1]=g;
				part.pixelData[offset*4+2]=b;
				part.pixelData[offset*4+3]=a;
				
				if(this.scheduledUpdate)
					return;
				
				(function(self){
					self.scheduledUpdate=true;
					window.setTimeout(function(){self.update();},0);
				})(this);
			},
			
			parseColor:function(str){
				var m;
				
				if(m=(/#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})/i).exec(str)){
					return [+("0x"+m[1]),+("0x"+m[2]),+("0x"+m[3]),255];
				}else if(m=(/#([0-9a-f])([0-9a-f])([0-9a-f])/i).exec(str)){
					return [+("0x0"+m[1])*17,+("0x0"+m[2])*17,+("0x0"+m[3])*17,255];
				}else if(m=(/rgb\(([0-9]+),([0-9]+),([0-9]+)\)/i).exec(str)){
					return [+(m[1]),+(m[2]),+(m[3]),255];
				}else if(m=(/rgba\(([0-9]+),([0-9]+),([0-9]+),([0-9]+)\)/i).exec(str)){
					return [+(m[1]),+(m[2]),+(m[3]),+(m[4])];
				}else if(m=(/hsl\(([0-9]+),([0-9]+)%,([0-9]+)%\)/i).exec(str)){
					var h=(+m[1]);
					var s=(+m[2])/100;
					var l=(+m[3])/100;
					
					if(l<=0.5)
						var C=2*l*s;
					else
						var C=(2-2*l)*s;
					
					var Hm=h/60;
					var X=C*(1-Math.abs((Hm%2)-1));
					
					if(0<=Hm && Hm<1)
						var RGBA=[C,X,0,255];
					else if(1<=Hm && Hm<2)
						var RGBA=[X,C,0,255];
					else if(2<=Hm && Hm<3)
						var RGBA=[0,C,X,255];
					else if(3<=Hm && Hm<4)
						var RGBA=[0,X,C,255];
					else if(4<=Hm && Hm<5)
						var RGBA=[X,0,C,255];
					else if(5<=Hm && Hm<6)
						var RGBA=[C,0,X,255];
					else
						var RGBA=[0,0,0,255];
					
					var k=l-C/2;
					return [(RGBA[0]+k)*255,(RGBA[1]+k)*255,(RGBA[2]+k)*255,255];
				}else{
					return [0,0,0,255];
				}
			}
		};
		
		canvas.getContext=function(w){
				if(w=="2d" && this.___DUC___)
					return this.___DUC___.context;
		};
		
		canvas.toDataURL=function(){
			return this.outerHTML;
		};
		canvas.___DUC___.init(300,150);
		
		return canvas;
	};
	
	//Overwrite document.createElement to run createCanvas if arg0=="canvas
	document.createElement=function(n){
		if(n=="canvas")
			return createCanvas(this);
		else
			return createElement.call(this,n);
	};
	

})();