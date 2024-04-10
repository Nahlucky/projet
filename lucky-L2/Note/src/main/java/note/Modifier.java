package note;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.sql.SQLException;


public class Modifier extends HttpServlet {
	private static final long serialVersionUID = 1L;
 
    public Modifier() {
        super();
    }

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		try {
			int id = Integer.parseInt(request.getParameter("id"));
			String titre = request.getParameter("titre");
			String corps = request.getParameter("corps");
			Note note = new Note(titre, corps);
			note.setId(id);
			
			if(note.join()) {
				note.update();
				response.sendRedirect("index.jsp");
			}
		} catch (ClassNotFoundException | SQLException e) {
			response.sendRedirect("error.html");
		}
	}

}
