import java.applet.*;
import java.awt.*;
public class SmileyFace extends Applet
{
public void init(){}
public void paint(Graphics g)
{
g.setColor(Color.YELLOW);
g.drawOval(20,40,250,250);
g.fillOval(50,100,50,70);
g.fillOval(185,100,50,70);
g.drawLine(138,160,138,210);
g.drawLine(138,210,155,210);
g.drawArc(75,156,170,100,180,180);
}
}