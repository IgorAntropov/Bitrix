'use strict';

var KraytSiteApp = angular.module('KraytSiteApp',['ngAnimate']);

KraytSiteApp.service("loaderModal",['$rootScope',function($rootScope){

    return {
        show: function()
        {
            $rootScope.loaderOpen = true;
        },
        hide:function () {
            $rootScope.loaderOpen = false;
        }
    }

}]);
KraytSiteApp.controller('CntrAddSite',['$scope','loaderModal','$timeout',"$rootScope","$http", function($scope,loaderModal,$timeout,$rootScope,$http){

    $scope.list_site = [];

    /*for (var i =0 ; i <5;i++)
     {
     $scope.list_site.push({TITLE:"as"+i});
     }*/
    $rootScope.confetti = false;
    $scope.blocks = blocks;
    $scope.current_step = 0;
    $scope.site_id = 0;

    $scope.select = {
        default: "Выбрать",
        open: false,
        openOn: function () {

            if($scope.select.open)
            {
                $scope.select.open = false;
            }else{
                $scope.select.open = true;
            }
        },
        Selected: function (k) {

            if($scope.list_site[k])
            {
                var select = $scope.list_site[k];
                $scope.select.default = select.TITLE;
                $scope.site_id = select.ID;
            }
        }
    };


    $scope.animated = {
        page1:{},
        page2:{},
        page2_desc:{},
        page2_btn:{},
        step1:{},
        step2:{},
        step3:{},
        step4:{}
    };
    $scope.desctop = true;

    var start_page = $timeout(function() {
        $scope.animated.page1 = {
            animated_hello:true
        };
    }, 100);

    start_page.then(function () {
        $timeout(function() {
            $scope.animated.page1 = {
                animated_hello_hide:true
            };
        }, 2000).then(function () {

            $timeout(function() {
                $scope.animated.page1 = {
                    animated_hello_none:true
                };
            },1500).then(function () {
                $scope.desctop = false;

                $scope.animated.page2 = {
                    animated:true,
                    fadeIn:true
                };
            });
        });
    });


    $scope.name_page = pageDefault.TITLE;


    $scope.installSiteMore = function () {

        $scope.current_step = 1;
        $scope.animated.page2 = {
            create_page_none:true
        };

    };
    $scope.installSite = function () {


        loaderModal.show();


        BX.ajax.post(
            location.href,
            {
                "name_comp":"krayt:install_page",
                "method":"getListSite"
            },
            function (data) {


                var res = BX.parseJSON(data);
                var sites = res;

                if(sites.length > 0 && Array.isArray(sites))
                {
                    $scope.animated.page2_desc = {
                        animated:true,
                        fadeOutUp:true
                    };
                    $scope.animated.page2_btn = {
                        animated:true,
                        fadeOut:true
                    };
                    $timeout(function() {
                        $scope.animated.step1 ={
                            animated:true,
                            fadeIn:true
                        };

                        $scope.current_step = 1;
                    },1000).then(function () {
                        $scope.animated.page2 = {
                            create_page_none:true,
                        };

                    });

                    $scope.$apply(function () {

                        $scope.list_site = sites;
                        $scope.current_step = 1;

                        $scope.list_site.unshift({
                            "ID":"0",
                            "TITLE":'Выбрать'
                        });
                    });

                }else{

                    $scope.animated.page2_desc = {
                        animated:true,
                        fadeOutUp:true
                    };
                    $scope.animated.page2_btn = {
                        animated:true,
                        fadeOut:true
                    };
                    $timeout(function() {
                        $scope.animated.step4 ={
                            animated:true,
                            fadeIn:true
                        };
                        $scope.$apply(function () {
                            $scope.current_step = 4;

                        });
                    },1000).then(function () {
                        $scope.animated.page2 = {
                            create_page_none:true,
                        };
                    });
                }
                $scope.$apply(function () {
                    loaderModal.hide();
                });
            }
        );

    };
    $scope.createSite = function () {

        if($scope.sites_page.name_site.$invalid)
        {
            return false;
        }

        var fields_site = {
            TITLE: $scope.name_site,
            CODE: BX.util.getRandomString(),
            DOMAIN_ID: ""
        };
        loaderModal.show();
        BX24.callMethod(
            'landing.site.add',
            {
                fields: fields_site
            },
            function(result)
            {
                if(result.error())
                {
                    console.error(result.error());
                }
                else
                {
                    $scope.animated.step4 ={
                        animated:true,
                        fadeOut:true
                    };
                    $scope.installSite();
                }

                $scope.$apply(function () {

                    loaderModal.hide();
                });
            }
        );



    };
    $scope.nextStep = function (step) {

        if(step == 2)
        {
            if($scope.site_id == 0)
            {
                return false;
            }
        }
        if(step == 4)
        {
            $scope.animated.step4 = {
                animated:true,
                fadeIn:true
            };
            $scope.animated.step1 = {
                animated:true,
                fadeIn:true
            };
        }
        if(step == 1 && $scope.current_step == 2)
        {
            $scope.animated.step2 = {
                animated:true,
                fadeIn:false
            };
            $scope.animated.step1 = {
                animated:true,
                fadeIn:true
            };
        }
        if(step == 2)
        {
            $scope.animated.step1 = {
                animated:true,
                fadeIn:false
            };
            $scope.animated.step2 = {
                animated:true,
                fadeIn:true
            };
        }
        if(step == 3)
        {
            $scope.animated.step2 = {
                animated:false,
                fadeIn:false
            };
            $scope.animated.step3 = {
                animated:true,
                fadeIn:true
            };
            $rootScope.confetti = true;

            confitti.start();
            $timeout(function() {
                $rootScope.confetti = false;
            }, 4500);

        }
        $scope.current_step = step;
    };
    $scope.addPage = function () {

        if($scope.sites_page.name_page.$invalid)
        {
            return false;
        }

        loaderModal.show();

            BX.ajax.post(
                location.href,
                {
                    "name_comp":"krayt:install_page",
                    "method":"addPage",
                    SITE_ID:  $scope.site_id,
                    TITLE: $scope.name_page
                },
            function(result)
            {
                var res = BX.parseJSON(result);

                if(res.ok == 1)
                {
                    $scope.$apply(function () {
                        $scope.nextStep(3);
                        $scope.current_step = 3;
                        loaderModal.hide();
                    });
                }else
                {
                    alert(res.error);
                }

            }
        );

    };



    $scope.callbackPacke = function(id) {

        location.href = location.origin+"/package/"+id+'/';
    }
}]);


