(function($) {
			var Tree = function(element, options) {
				this.element = element;
				this.JSONArr = options.arr;
				this.simIcon = options.simIcon || "";
				this.mouIconOpen = options.mouIconOpen || "fa fa-folder-open-o";
				this.mouIconClose = options.mouIconClose || "fa fa-folder-o";
				this.callback = options.callback || function() {};
				this.init();

			}
			Tree.prototype.init = function() {
				this.JSONTreeArr = this.proJSON(this.JSONArr, 0);
				this.treeHTML = this.proHTML(this.JSONTreeArr);
				this.element.append(this.treeHTML);
				this.bindEvent();
			}
			Tree.prototype.proJSON = function(oldArr, pid) {
				var newArr = [];
				var self = this;
				oldArr.map(function(item) {
					if(item.pid == pid) {
						var obj = {
							id: item.id,
							name: item.name
						}
						var child = self.proJSON(oldArr, item.id);
						if(child.length > 0) {
							obj.child = child
						}
						newArr.push(obj)
					}

				})
				return newArr;
//<a id=' xxx ""
			};
			Tree.prototype.proHTML = function(arr) {
				var ulHtml = "<ul class='menuUl'>";
				var self = this;
				arr.map(function(item) {
					var lihtml = "<li>";
					if(item.child && item.child.length > 0) {
						lihtml += "<i ischek='true' class='" + self.mouIconOpen + "'></i>" +
							"<a id='" + item.id + "'href='#'" + ">" + item.name + "</a>"
						var _ul = self.proHTML(item.child);
						lihtml += _ul + "</li>";
					} else {
						lihtml += "<i class='" + self.simIcon + "'></i>" +
							"<a id='" + item.id +"'href='#'" + ">" + item.name + "</a>";
					}
					ulHtml += lihtml;
				})
				ulHtml += "</ul>";
				return ulHtml;
			}
			Tree.prototype.bindEvent = function() {
				var self = this;
				this.element.find(".menuUl li i").click(function() {
					var ischek = $(this).attr("ischek");
					if(ischek == 'true') {
						var menuUl = $(this).closest("li").children(".menuUl");
						$(this).removeClass(self.mouIconOpen).addClass(self.mouIconClose)
						menuUl.hide();
						$(this).attr("ischek", 'false');
					} else if(ischek == 'false') {
						var menuUl = $(this).closest("li").children(".menuUl");
						menuUl.show();
						$(this).removeClass(self.mouIconClose).addClass(self.mouIconOpen)
						$(this).attr("ischek", 'true')
					}
				});

				this.element.find(".menuUl li span").click(function() {
					var id = $(this).attr("id");
					var name = $(this).text();
					self.callback(id, name)
				})
			}
			$.fn.extend({
				ProTree: function(options) {
					return new Tree($(this), options)
				}
			})
		})(jQuery);