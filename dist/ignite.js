var Ignite=function(e){"use strict";return e.select_dropdown=e=>({show:!1,value:e.value??null,display:e.display??"",placeholder:e.placeholder??"Select an option",init(){this.$watch("value",(e=>{this.$refs.input.dispatchEvent(new Event("input"))}))},open(){this.show=!0},close(){this.show=!1},toggle(){this.show=!this.show},isPlaceholderSelected(){return null==this.value},select(e,l){this.value=e,this.display=l,this.close()},selectPlaceholder(){this.select(null,this.placeholder)}}),Object.defineProperty(e,"__esModule",{value:!0}),e}({});
//# sourceMappingURL=ignite.js.map
