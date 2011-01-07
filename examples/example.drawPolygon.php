<?php   
 /* @ 700x230 Polygon drawing example. */

 /* pChart library inclusions */
 include("../class/pData.class");
 include("../class/pDraw.class");
 include("../class/pImage.class");

 /* Create the pChart object */
 $myPicture = new pImage(700,230);

 /* Draw the background */
 $Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
 $myPicture->drawFilledRectangle(0,0,700,230,$Settings);

 /* Overlay with a gradient */
 $Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
 $myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,$Settings);
 $myPicture->drawGradientArea(0,0,700,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>80));

 /* Add a border to the picture */
 $myPicture->drawRectangle(0,0,699,229,array("R"=>0,"G"=>0,"B"=>0));

 /* Write the picture title */ 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Silkscreen.ttf","FontSize"=>6));
 $myPicture->drawText(10,13,"drawPolygon - Draw polygons",array("R"=>255,"G"=>255,"B"=>255));

 /* Enable shadow computing */
 $myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

 /* Draw some polygons */
 $Step  = 8;
 $White = array("R"=>255,"G"=>255,"B"=>255,"Surrounding"=>-200);
 for($i=1;$i<=4;$i++)
  {
   $Points = "";
   for($j=0;$j<=360;$j=$j+(360/$Step))
    {
     $Points[] = cos(deg2rad($j))*50+($i*140);
     $Points[] = sin(deg2rad($j))*50+120;
    }
   $myPicture->drawPolygon($Points,$White);
   $Step = $Step * 2;
  }

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.drawPolygon.png");
?>