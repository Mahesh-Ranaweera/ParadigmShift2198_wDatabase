
(function($,Edge,compId){var Composition=Edge.Composition,Symbol=Edge.Symbol;
//Edge symbol: 'stage'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",2250,function(sym,e){sym.stop();});
//Edge binding end
Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",250,function(sym,e){sym.stop();});
//Edge binding end
Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",2750,function(sym,e){sym.stop();});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_contact2}","click",function(sym,e){sym.play("hover");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_contact2}","mouseover",function(sym,e){sym.play("hover");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_contact2}","mouseout",function(sym,e){sym.play("hoverout");});
//Edge binding end
})("stage");
//Edge symbol end:'stage'

//=========================================================

//Edge symbol: 'hover'
(function(symbolName){})("hover");
//Edge symbol end:'hover'

//=========================================================

//Edge symbol: 'mapbox'
(function(symbolName){Symbol.bindSymbolAction(compId,symbolName,"creationComplete",function(sym,e){});
//Edge binding end
})("mapbox");
//Edge symbol end:'mapbox'

//=========================================================

//Edge symbol: 'map'
(function(symbolName){Symbol.bindSymbolAction(compId,symbolName,"creationComplete",function(sym,e){var container=sym.$('mapBox');var map='<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2879.5660927441513!2d-79.31804!3d43.802615999999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4d3be877d9fbf%3A0xee9889b9449d1801!2sL&#39;Amoreaux+Collegiate+Institute!5e0!3m2!1sen!2sca!4v1409538012764" width="393" height="379" frameborder="0" style="border:0"></iframe>';container.html(map);});
//Edge binding end
})("map");
//Edge symbol end:'map'

//=========================================================

//Edge symbol: 'hoverup'
(function(symbolName){})("hoverup");
//Edge symbol end:'hoverup'
})(jQuery,AdobeEdge,"EDGE-12297263");