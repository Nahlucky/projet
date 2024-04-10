package note;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.sql.SQLException;

public class Supprimer extends HttpServlet {
	private static final long serialVersionUID = 1L;

    public Supprimer() {
        super();
    }


	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		try {
			String titre = request.getParameter("supprTitre");
			String corps = request.getParameter("supprCorps");
			Note note = new Note(titre, corps);
			
			if(note.join()) {
				note.delete();
				response.sendRedirect("index.jsp");
			}
		} catch (ClassNotFoundException | SQLException e) {
			response.sendRedirect("error.html");
		}
	}

}
