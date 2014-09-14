if(jQuery("#slider1_container").children(":first").css("width",(jQuery("#slider1_container").parent().width()-200))){
				var options = {
					$AutoPlay: true,
					$ArrowNavigatorOptions: {
						$Class: $JssorArrowNavigator$,
                        $ChanceToShow: 1,
                        $AutoCenter: 0,
                        $Steps: 1,
                        $AutoPlay: true,
						$ActionMode : 3
					},
					$BulletNavigatorOptions: {
						$Class: $JssorBulletNavigator$,
                        $ChanceToShow: 2,
                        $AutoCenter: 1,
                        $AutoPlay: true,
						$Orientation : 1,
						$ActionMode : 1,
						$steps : 1,
						$Lanes : 1
					}
				};
				var jssor_slider1 = new $JssorSlider$('slider1_container', options);
				function ScaleSlider() {
					var parentWidth = $('#slider1_container').parent().width();
					if (parentWidth) {
						jssor_slider1.$SetScaleWidth(parentWidth);
					}
					else
						window.setTimeout(ScaleSlider, 30);
				}
				//Scale slider after document ready
				ScaleSlider();
				if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
					$(window).bind('resize', ScaleSlider);
				}
			}