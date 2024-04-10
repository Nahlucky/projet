package note;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.sql.SQLException;

import util.Database;

public class Ajout extends HttpServlet {
	private static final long serialVersionUID = 1L;

    public Ajout() {
        super();
    }

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		try {
			String titre = request.getParameter("titre");
			String corps = request.getParameter("corps");
			Note note = new Note(titre, corps);
			
			if(note.join()) {
				note.save();
				response.sendRedirect("index.jsp");
			}
		} catch (ClassNotFoundException | SQLException e) {
			response.sendRedirect("error.html");
		}
	}

}
