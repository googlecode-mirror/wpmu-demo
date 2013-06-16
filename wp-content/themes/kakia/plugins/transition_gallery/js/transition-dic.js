var transitions3d = [];

transitions3d.push(
	{
		name  :'Group #01',
	 	trans :[
	 			{
	 				name:'Transition #01' , 
	 			 	code:'tr1 : {\n		duration:1.6,\n		overlapping:0.08,\n		row:1,\n		col:7,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Cubic, side:"l"})\n	}'
	 			},	
	 			{
					name:'Transition #02', 
					code:'tr2 : {\n		duration:1.6,\n		overlapping:0.08,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Cubic, side:"b"})\n	}'
				},	
	 			{
					name:'Transition #03', 
					code:'tr3: {\n		duration:1.8,\n		overlapping:0.08,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Quartic, side:"l"})\n	}'
				},	
	 			{
					name:'Transition #04', 
					code:'tr4 : {\n		duration:1.8,\n		overlapping:0.08,\n		row:5,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Quartic, side:"l" , zmove:-600})\n	}'
				},
	 			{
					name:'Transition #05', 
					code:'tr5: {\n		duration:2.6,\n		overlapping:0.03,\n		row:5,\n		col:1,\n		selector :new Aroma.RandSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Exponential, side:"r"})\n	}'
				},
	 			{
					name:'Transition #06', 
					code:'tr6: {\n		duration:1.7,\n		overlapping:0.03,\n		row:1,\n		col:8,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Back, side:"t" , zmove:-250  })\n	}'
				},
	 			{
					name:'Transition #07', 
					code:'tr7: {\n		duration:2,\n		overlapping:0.07,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("blu"),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Cubic, side:"r" , zmove:-550 })\n	}'
				},
	 			{
					name:'Transition #08', 
					code:'tr8: {\n		duration:2.4,\n		overlapping:0.04,\n		row:1,\n		col:10,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Quartic, side:"b" , zmove:-800 })\n	}'
				},
	 			{
					name:'Transition #09', 
					code:'tr9: {\n		duration:2,\n		overlapping:0.08,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Quadratic	, side:"r" , zmove:-800 })\n	}'
				},
	 			{
					name:'Transition #10', 
					code:'tr10: {\n		duration:3.5,\n		overlapping:0.025,\n		row:1,\n		col:5,\n		selector :new Aroma.RandSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Exponential , side:"t"  })\n	}'
				},
				{
					name:'Transition #11', 
					code:'tr11: {\n		duration:3.5,\n		overlapping:0.025,\n		row:5,\n		col:1,\n		selector :new Aroma.RandSelector(),\n		effect:new Cute.Effect5({ease:TWEEN.Easing.Exponential , side:"r"  })\n	}'
				}
	 	]
	}
)

transitions3d.push(
	{
		name  :'Group #02',
	 	trans :[
	 			{
					name:'Transition #12', 
					code:'tr12: {\n		duration:1.6,\n		overlapping:0.07,\n		row:1,\n		col:6,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect6({ease:TWEEN.Easing.Back , side:"t"  })\n	}'
				},
	 			{
					name:'Transition #13', 
					code:'tr13: {\n		duration:1.6,\n		overlapping:0.07,\n		row:2,\n		col:4,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect6({ease:TWEEN.Easing.Back , side:"l"  })\n	}'
				}
	 	]
	}
)

transitions3d.push(
	{
		name  :'Group #03',
	 	trans :[
	 			{
					name:'Transition #14', 
					code:'tr14: {\n		duration:1.7,\n		overlapping:0.05,\n		row:1,\n		col:4,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect7({ease:TWEEN.Easing.Back })\n	}'
				},
	 			{
					name:'Transition #15', 
					code:'tr15: {\n		duration:1.7,\n		overlapping:0.07,\n		row:4,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect7({ease:TWEEN.Easing.Quartic , dir:"horizontal"})\n	}'
				},
	 			{
					name:'Transition #16', 
					code:'tr16 : {\n	duration:1.7,\n		overlapping:0.03,\n		row:8,\n		col:1,\n		selector:new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect7({ease:TWEEN.Easing.Back , xspace:15 })\n	}'
				},
				{
					name:'Transition #17', 
					code:'tr17 : {\n		duration:1.7,\n		overlapping:0.08,\n		row:1,\n		col:5,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect7({ease:TWEEN.Easing.Quintic  })\n	}'
				},
				{
					name:'Transition #18', 
					code:'tr18: {\n		duration:2,\n		overlapping:0.0001,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect7({ease:TWEEN.Easing.Exponential })\n	}'
				}
	 	]
	}
)

transitions3d.push(
	{
		name  :'Group #04',
	 	trans :[
	 			{
					name:'Transition #19', 
					code:'tr19: {\n		duration:2.2,\n		overlapping:0.02,\n		row:1,\n		col:8,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential , sidecolor:0x333333})\n	}'
				},
	 			{
					name:'Transition #20', 
					code:'tr20: {\n		duration:2.8,\n		overlapping:0.03,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("brl"),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential , sidecolor:0x333333 , dir:"l"})\n	}'
				},
	 			{
					name:'Transition #21', 
					code:'tr21 : { \n		duration:2.8,\n		overlapping:0.03,\n		row:5,\n		col:1,\n		selector:new Aroma.RandSelector(),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential , sidecolor:0x333333 , dir:"l"})\n	}'
				},
	 			{
					name:'Transition #22', 
					code:'tr22: {\n		duration:2,\n		overlapping:0.03,\n		row:1,\n		col:8,\n		selector :new Aroma.SerialSelector("brl"),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Back , sidecolor:0x333333 , side:"t" })\n	}'
				},
	 			{
					name:'Transition #23', 
					code:'tr23: {\n		duration:2.3,\n		overlapping:0.05,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Cubic , sidecolor:0x333333 , dir:"r" ,yspace:5 , zmove:-1200 })\n	}'
				},
	 			{
					name:'Transition #24', 
					code:'tr24 : {\n		duration:2.8,\n		overlapping:0.03,\n		row:1,\n		col:13,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential , sidecolor:0x333333 , dir:"l"})\n	}'
				},
	 			{
					name:'Transition #25', 
					code:'tr25 : {\n		duration:2.8,\n		overlapping:0.03,\n		row:8,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential , sidecolor:0x333333 , dir:"u"})\n	}'
				},
	 			{
					name:'Transition #26', 
					code:'tr26: {\n		duration:2.5,\n		overlapping:0.02,\n		row:1,\n		col:8,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential , sidecolor:0x333333 , depth:20})\n	}'
				},
	 			{
					name:'Transition #27', 
					code:'tr27: {\n		duration:1.6,\n		overlapping:0.05,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Cubic, dir:"r" , zmove:-800 , sidecolor:0x333333 , depth:20})\n	}'
				},
	 			{
					name:'Transition #28', 
					code:'tr28: {\n		duration:2.8,\n		overlapping:0.03,\n		row:4,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential, dir:"r" , zmove:-1600 , sidecolor:0x333333 , depth:18})\n	}'
				},
	 			{
					name:'Transition #29', 
					code:'tr29: {\n		duration:4.6,\n		overlapping:0.01,\n		row:11,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Back, dir:"r" , zmove:-600 , yspace:5 , sidecolor:0x333333 , stack:true , balance:0.6})\n	}'
				},
	 			{
					name:'Transition #30', 
					code:'tr30: {\n		duration:2.3,\n		overlapping:0.03,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential, dir:"r" , zmove:-1500 , yspace:5 , sidecolor:0x777777 })\n	}'
				},
	 			{
					name:'Transition #31', 
					code:'tr31 : {\n		duration:2.8,\n		overlapping:0.03,\n		row:8,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential , sidecolor:0x333333 , depth:10 , dir:"u"})\n	}'
				},
	 			{
					name:'Transition #32', 
					code:'tr32 : {\n		duration:2.8,\n		overlapping:0.03,\n		row:1,\n		col:5,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential , sidecolor:0x333333 , depth:10 , dir:"l"})\n	}'
				},
				{
					name:'Transition #33', 
					code:'tr33: {\n		duration:3.3,\n		overlapping:0.03,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Back, dir:"r" , zmove:-600 , stack:true , yspace:5 , sidecolor:0x777777 })\n	}'
				},
				{
					name:'Transition #34', 
					code:'tr34: {\n		duration:3.3,\n		overlapping:0.03,\n		row:1,\n		col:5,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Back, dir:"r" , zmove:-600 , stack:true , xspace:5 , sidecolor:0x777777 })\n	}'
				},
				{
					name:'Transition #35', 
					code:'tr35: {\n		duration:3.3,\n		overlapping:0.03,\n		row:1,\n		col:7,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Back, dir:"u" , zmove:-600 , stack:true , xspace:5 , sidecolor:0x777777 })\n	}'
				},
				{
					name:'Transition #36', 
					code:'tr36: {\n		duration:2.3,\n		overlapping:0.08,\n		row:2,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect8({ease:TWEEN.Easing.Exponential, dir:"l" , zmove:-1700 , xspace:5 , sidecolor:0x777777 })\n	}'
				},				
	 	]
	}
)

transitions3d.push(
	{
		name  :'Group #05',
	 	trans :[
	 			{
					name:'Transition #37', 
					code:'tr37: {\n		duration:3.5,\n		overlapping:0.02,\n		row:1,\n		col:7,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect9({ease:TWEEN.Easing.Exponential,depth:10,sidecolor:0x777777 })\n	}'
				},
	 			{
					name:'Transition #38', 
					code:'tr38 : {\n		duration:3.5,\n		overlapping:0.02,\n		row:1,\n		col:5,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect9({ease:TWEEN.Easing.Exponential,depth:15,sidecolor:0x777777 , zmove:-200 })\n	}'
				},
	 			{
					name:'Transition #39', 
					code:'tr39 : {\n		duration:3.5,\n		overlapping:0.02,\n		row:2,\n		col:3,\n		selector:new Aroma.RandSelector(),\n		effect:new Cute.Effect9({ease:TWEEN.Easing.Exponential,depth:15,sidecolor:0x777777 , zmove:-200 })\n	}'
				},
	 			{
					name:'Transition #40', 
					code:'tr40: {\n		duration:3.5,\n		overlapping:0.02,\n		row:3,\n		col:1,\n		selector:new Aroma.RandSelector(),\n		effect:new Cute.Effect9({ease:TWEEN.Easing.Back,depth:15,sidecolor:0x777777 , zmove:-200 })\n	}'
				},
				{
					name:'Transition #41', 
					code:'tr41: {\n		duration:2.5,\n		overlapping:0.03,\n		row:1,\n		col:7,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect9({ease:TWEEN.Easing.Exponential,depth:10,xspace:5 , zmove:-500,sidecolor:0x777777 })\n	}'
				},
				{
					name:'Transition #42', 
					code:'tr42: {\n		duration:2.5,\n		overlapping:0.03,\n		row:1,\n		col:8,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect9({ease:TWEEN.Easing.Exponential,xspace:5 , zmove:-500,sidecolor:0x777777 })\n	}'
				},
				{
					name:'Transition #43', 
					code:'tr43: {\n		duration:1.5,\n		overlapping:0.03,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("brl"),\n		effect:new Cute.Effect9({ease:TWEEN.Easing.Cubic,sidecolor:0x777777 })\n	}'
				}
	 	]
	}
);

transitions3d.push(
	{
		name  :'Group #06',
	 	trans :[
	 			{
					name:'Transition #44', 
					code:'tr44: {\n		duration:2.5,\n		overlapping:0.02,\n		row:1,\n		col:8,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , dir:"vertical",sidecolor:0x777777  })\n	}'
				},
	 			{
					name:'Transition #45', 
					code:'tr45: {\n		duration:1.6,\n		overlapping:0.07,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("brl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Cubic , dir:"horizontal",sidecolor:0x777777  })\n	}'
				},
	 			{
					name:'Transition #46', 
					code:'tr46 : {\n		duration:3.5,\n		overlapping:0.021,\n		row:1,\n		col:8,\n		selector:new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , dir:"tr" , depth:10  ,sidecolor:0x777777})\n	}'
				},
	 			{
					name:'Transition #47', 
					code:'tr47 : {\n		duration:3.5,\n		overlapping:0.021,\n		row:8,\n		col:1,\n		selector:new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , dir:"vertical" , depth:10  ,sidecolor:0x777777})\n	}'
				},
	 			{
					name:'Transition #48', 
					code:'tr48 : {\n		duration:3.5,\n		overlapping:0.021,\n		row:4,\n		col:1,\n		selector:new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , dir:"vertical" , yspace:-20 , depth:10  ,sidecolor:0x777777})\n	}'
				},
	 			{
					name:'Transition #49', 
					code:'tr49 : {\n		duration:3.5,\n		overlapping:0.021,\n		row:1,\n		col:8,\n		selector:new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , dir:"horizontal" , xspace:-20 , depth:10  ,sidecolor:0x777777})\n	}'
				},
	 			{
					name:'Transition #50', 
					code:'tr50 : {\n		duration:3.5,\n		overlapping:0.08,\n		row:6,\n		col:1,\n		selector:new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , zmove:-1200 , dir:"horizontal" ,sidecolor:0x777777})\n	}'
				},
	 			{
					name:'Transition #51', 
					code:'tr51 : {\n		duration:3.5,\n		overlapping:0.08,\n		row:6,\n		col:1,\n		selector:new Aroma.SerialSelector("brl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , zmove:-1200 , dir:"horizontal" ,sidecolor:0x777777})\n	}'
				},
	 			{
					name:'Transition #52', 
					code:'tr52: {\n		duration:2,\n		overlapping:0.07,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Cubic , dir:"horizontal",sidecolor:0x777777 , yspace:5 , zmove:-1000 })\n	}'
				},
				{
					name:'Transition #53', 
					code:'tr53: {\n		duration:3.5,\n		overlapping:0.03,\n		row:1,\n		col:7,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential ,sidecolor:0x777777 , depth:20 })\n	}'
				},
				{
					name:'Transition #54', 
					code:'tr54: {\n		duration:2.8,\n		overlapping:0.03,\n		row:4,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , zmove:-1200 , dir:"horizontal" ,sidecolor:0x777777 , depth:20 })\n	}'
				},
				{
					name:'Transition #55', 
					code:'tr55: {\n		duration:3.5,\n		overlapping:0.0001,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , zmove:-1200 , dir:"horizontal" ,sidecolor:0x777777})\n	}'
				},
				{
					name:'Transition #56', 
					code:'tr56: {\n		duration:3.5,\n		overlapping:0.0001,\n		row:1,\n		col:8,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , zmove:-700  ,sidecolor:0x777777})\n	}'
				},
				{
					name:'Transition #57', 
					code:'tr57 : {\n		duration:3.5,\n		overlapping:0.08,\n		row:1,\n		col:8,\n		selector:new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , zmove:-100 , dir:"vertical" ,sidecolor:0x777777})\n	}'
				},
				{
					name:'Transition #58', 
					code:'tr58 : {\n		duration:3.5,\n		overlapping:0.08,\n		row:1,\n		col:4,\n		selector:new Aroma.RandSelector(),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , zmove:-100 , dir:"vertical" ,sidecolor:0x777777})\n	}'
				},
				{
					name:'Transition #59', 
					code:'tr59: {\n		duration:3.5,\n		overlapping:0.0001,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , depth:20  ,sidecolor:0x777777})\n	}'
				},
				{
					name:'Transition #60', 
					code:'tr60: {\n		duration:3.5,\n		overlapping:0.021,\n		row:1,\n		col:7,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect10({ease:TWEEN.Easing.Exponential , dir:"tr" , zmove:-400 , depth:20  ,sidecolor:0x777777})\n	}'
				}
	 	]
	}
)

transitions3d.push(
	{
		name  :'Group #07',
	 	trans :[
	 			{
					name:'Transition #61', 
					code:'tr61: {\n		duration:3.5,\n		overlapping:0.021,\n		row:1,\n		col:5,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect11({ease:TWEEN.Easing.Quartic , dir:"tr" , zmove:-400 , depth:10  ,sidecolor:0x777777})\n	}'
				},
	 			{
					name:'Transition #62', 
					code:'tr62 : {\n		duration:3.5,\n		overlapping:0.021,\n		row:1,\n		col:10,\n		selector:new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect11({ease:TWEEN.Easing.Quartic , dir:"tr" , zmove:-100 , depth:10  ,sidecolor:0x777777})\n	}'
				},
	 			{
					name:'Transition #63', 
					code:'tr63: {\n		duration:4.5,\n		overlapping:0.021,\n		row:4,\n		col:4,\n		selector :new Aroma.RandSelector(),\n		effect:new Cute.Effect11({ease:TWEEN.Easing.Back , dir:"tl" , zmove:-600 , depth:10  ,sidecolor:0x777777})\n	}'
				},
				{
					name:'Transition #64', 
					code:'tr64: {\n		duration:4.5,\n		overlapping:0.021,\n		row:4,\n		col:4,\n		selector :new Aroma.RandSelector(),\n		effect:new Cute.Effect12({ease:TWEEN.Easing.Back  , zmove:-600 , depth:10  ,sidecolor:0x777777})\n	}'
				}
	 	]
	}
);


var transitions2d = [];
transitions2d.push(
	{
		name  :'Group #01',
	 	trans :[
	 			{
					name:'Transition #01', 
					code:'tr1: {\n		duration:1.2,\n		overlapping:0.08,\n		row:1,\n		col:10,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #02', 
					code:'tr2: {\n		duration:1.2,\n		overlapping:0.05,\n		row:1,\n		col:10,\n		selector :new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #03', 
					code:'tr3: {\n		duration:0.9,\n		overlapping:0.08,\n		row:1,\n		col:10,\n		selector:new Aroma.RandSelector(),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #04', 
					code:'tr4: {\n		duration:0.9,\n		overlapping:0.08,\n		row:8,\n		col:1,\n		selector:new Aroma.SerialSelector("brl"),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #05', 
					code:'tr5: {\n		duration:0.9,\n		overlapping:0.08,\n		row:8,\n		col:1,\n		selector:new Aroma.SerialSelector("trl"),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #06', 
					code:'tr6: {\n		duration:1.7,\n		overlapping:0.05,\n		row:5,\n		col:5,\n		selector :new Aroma.SerialSelector("trl" , true),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #07', 
					code:'tr7: {\n		duration:1.8,\n		overlapping:0.05,\n		row:5,\n		col:5,\n		selector :new Aroma.SerialSelector("brl" , false),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #08', 
					code:'tr8: {\n		duration:1.5,\n		overlapping:0.025,\n		row:5,\n		col:5,\n		selector :new Aroma.DiagonalSelector("br"),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #09', 
					code:'tr9: {\n		duration:1.2,\n		overlapping:0.025,\n		row:5,\n		col:5,\n		selector :new Aroma.DiagonalSelector("bl"),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #10', 
					code:'tr10: {\n		duration:1.2,\n		overlapping:0.025,\n		row:5,\n		col:5,\n		selector :new Aroma.DiagonalSelector("tl"),\n		effect:new Cute.Effect1()\n	}'
				},	
	 			{
					name:'Transition #11', 
					code:'tr11: {\n		duration:1.2,\n		overlapping:0.025,\n		row:5,\n		col:5,\n		selector :new Aroma.DiagonalSelector("tr"),\n		effect:new Cute.Effect1()\n	}'
				},
	 			{
					name:'Transition #12', 
					code:'tr12: {\n		duration:1.2,\n		overlapping:0.025,\n		row:5,\n		col:5,\n		selector :new Aroma.RandSelector(),\n		effect:new Cute.Effect1()\n	}'
				}
	 	]
	}
)

transitions2d.push(
	{
		name  :'Group #02',
	 	trans :[
	 			{
					name:'Transition #13', 
					code:'tr13: {\n		duration:1.8,\n		overlapping:0.0001,\n		row:1,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , push:true})\n	}'
				},	
	 			{
					name:'Transition #14', 
					code:'tr14: {\n		duration:1.8,\n		overlapping:0.0001,\n		row:1,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"l" , push:true})\n	}'
				},		
	 			{
					name:'Transition #15', 
					code:'tr15: {\n		duration:1.4,\n		overlapping:0.0001,\n		row:1,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quartic , dir:"t" , push:true})\n	}'
				},	
	 			{
					name:'Transition #16', 
					code:'tr16: {\n		duration:1.8,\n		overlapping:0.0001,\n		row:1,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"b" , push:true})\n	}'
				},	
	 			{
					name:'Transition #17', 
					code:'tr17: {\n		duration:1.8,\n		overlapping:0.0001,\n		row:1,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"b" })\n	}'
				},
	 			{
					name:'Transition #18', 
					code:'tr18: {\n		duration:1.8,\n		overlapping:0.0001,\n		row:1,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"l" })\n	}'
				},
				{
					name:'Transition #19', 
					code:'tr19: {\n		duration:1.4,\n		overlapping:0.05,\n		row:1,\n		col:10,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quartic , dir:"l" , push:true})\n	}'
				},
				{
					name:'Transition #20', 
					code:'tr20: {\n		duration:2.2,\n		overlapping:0.05,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Exponential , dir:"l" , push:true})\n	}'
				},
				{
					name:'Transition #21', 
					code:'tr21: {\n		duration:2,\n		overlapping:0.06,\n		row:5,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Exponential , dir:"l" })\n	}'
				},
				{
					name:'Transition #22', 
					code:'tr22: {\n		duration:2,\n		overlapping:0.06,\n		row:5,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Exponential , dir:"r" })\n	}'
				},
				{
					name:'Transition #23', 
					code:'tr23: {\n		duration:2,\n		overlapping:0.06,\n		row:5,\n		col:1,\n		selector:new Aroma.RandSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Exponential , dir:"r" })\n	}'
				},
				{
					name:'Transition #24', 
					code:'tr24: {\n		duration:2,\n		overlapping:0.06,\n		row:5,\n		col:1,\n		selector:new Aroma.RandSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Exponential , dir:"l" , push:true})\n	}'
				},
				{
					name:'Transition #25', 
					code:'tr25: {\n		duration:2,\n		overlapping:0.05,\n		row:1,\n		col:8,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"t" })\n	}'
				},
				{
					name:'Transition #26', 
					code:'tr26: {\n		duration:2,\n		overlapping:0.05,\n		row:1,\n		col:8,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"b" })\n	}'
				},
				{
					name:'Transition #27', 
					code:'tr27: {\n		duration:2,\n		overlapping:0.05,\n		row:1,\n		col:8,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"b" , push:true })\n	}'
				},
				{
					name:'Transition #28', 
					code:'tr28: {\n		duration:2,\n		overlapping:0.05,\n		row:1,\n		col:8,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"bl" , push:true })\n	}'
				},
				{
					name:'Transition #29', 
					code:'tr29: {\n		duration:2,\n		overlapping:0.05,\n		row:4,\n		col:4,\n		selector:new Aroma.DiagonalSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"tl" , push:true })\n	}'
				},
				{
					name:'Transition #30', 
					code:'tr30: {\n		duration:2,\n		overlapping:0.05,\n		row:5,\n		col:1,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"tl" , push:true })\n	}'
				},
				{
					name:'Transition #31', 
					code:'tr31: {\n		duration:2,\n		overlapping:0.04,\n		row:4,\n		col:4,\n		selector:new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"tl" , push:false })\n	}'
				},
				{
					name:'Transition #32', 
					code:'tr32: {\n		duration:2,\n		overlapping:0.04,\n		row:4,\n		col:4,\n		selector:new Aroma.RandSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"tl" , push:false })\n	}'
				},
				{
					name:'Transition #33', 
					code:'tr33: {\n		duration:2,\n		overlapping:0.04,\n		row:4,\n		col:4,\n		selector:new Aroma.RandSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quintic , dir:"br" , push:false })\n	}'
				},
				{
					name:'Transition #34', 
					code:'tr34: {\n		duration:2.2,\n		overlapping:0.03,\n		row:1,\n		col:10,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Exponential , dir:"t" , push:true})\n	}'
				},
				{
					name:'Transition #35', 
					code:'tr35: {\n		duration:2.2,\n		overlapping:0.02,\n		row:1,\n		col:10,\n		selector :new Aroma.RandSelector(),\n		effect:new Cute.Effect2({ease:TWEEN.Easing.Quartic , dir:"t" , push:true})\n	}'
				}
	 	]
	}
)

transitions2d.push(
	{
		name  :'Group #03',
	 	trans :[
	 			{
					name:'Transition #36', 
					code:'tr36: {\n		duration:1.2,\n		overlapping:0.05,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect3({ease:TWEEN.Easing.Quartic  , push:true})\n	}'
				},	
	 			{
					name:'Transition #37', 
					code:'tr37: {\n		duration:1.8,\n		overlapping:0.02,\n		row:1,\n		col:10,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect3({ease:TWEEN.Easing.Quartic  , push:true})\n	}'
				},		
	 			{
					name:'Transition #38', 
					code:'tr38: {\n		duration:1.8,\n		overlapping:0.02,\n		row:2,\n		col:4,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect3({ease:TWEEN.Easing.Exponential  , push:true})\n	}'
				}
	 	]
	}
)
transitions2d.push(
	{
		name  :'Group #04',
	 	trans :[
	 			{
					name:'Transition #39', 
					code:'tr39: {\n		duration:1.8,\n		overlapping:0.05,\n		row:1,\n		col:8,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect4({ease:TWEEN.Easing.Exponential  , push:true})\n	}'
				},	
	 			{
					name:'Transition #40', 
					code:'tr40: {\n		duration:1.8,\n		overlapping:0.001,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect4({ease:TWEEN.Easing.Exponential  , push:true})\n	}'
				},		
	 			{
					name:'Transition #41', 
					code:'tr41: {\n		duration:1.8,\n		overlapping:0.05,\n		row:5,\n		col:1,\n		selector :new Aroma.SerialSelector(),\n		effect:new Cute.Effect4({ease:TWEEN.Easing.Exponential , dir:"horizontal"  , push:true})\n	}'
				}
	 	]
	}
)
