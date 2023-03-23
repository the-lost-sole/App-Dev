<%@ page import="java.sql.*" %>
<%
    Connection con = null;
    Statement stmt = null;
    ResultSet rs = null;
    try {
        Class.forName("com.mysql.jdbc.Driver");
        con = DriverManager.getConnection("jdbc:mysql://localhost:3306/mydb", "root", "password");
        stmt = con.createStatement();
        rs = stmt.executeQuery("SELECT * FROM Employee");
        out.println("<table border=1 width=50% height=50%>");
        out.println("<tr><th>Eid</th><th>Ename</th><th>Dept</th><th>Doj</th><th>Salary</th></tr>");
        while (rs.next()) {
            int Eid = rs.getInt("Eid");
            String Ename = rs.getString("Ename");
            String Dept = rs.getString("Dept");
            String Doj = rs.getString("Doj");
            int Salary = rs.getInt("Salary");
            out.println("<tr><td>" + Eid + "</td><td>" + Ename + "</td><td>" + Dept + "</td><td>" + Doj + "</td><td>" + Salary + "</td></tr>");
        }
        out.println("</table>");
    } catch (Exception e) {
        out.println("Error: " + e.getMessage());
    } finally {
        try {
            rs.close();
            stmt.close();
            con.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
%>