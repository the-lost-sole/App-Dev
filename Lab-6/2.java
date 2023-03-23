import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class FormServlet extends HttpServlet {
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println("<html><body>");
        out.println("<h1>Form Parameters</h1>");
        out.println("<table border=1>");
        java.util.Enumeration e = request.getParameterNames();
        while (e.hasMoreElements()) {
            String paramName = (String) e.nextElement();
            out.println("<tr><td>" + paramName + "</td><td>" + request.getParameter(paramName) + "</td></tr>");
        }
        out.println("</table>");
        out.println("</body></html>");
    }
}