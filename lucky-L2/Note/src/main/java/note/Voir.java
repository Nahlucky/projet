package note;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.sql.SQLException;

public class Voir extends HttpServlet {
	private static final long serialVersionUID = 1L;

    public Voir() {
        super();
    }

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		try {
			String titre = request.getParameter("voirTitre");
			String corps = request.getParameter("voirCorps");
			Note note = new Note(titre, corps);
			
			if(note.join()) {
				request.setAttribute("note", note);
				request.getRequestDispatcher("vue.jsp").forward(request, response);
			}
		} catch (ClassNotFoundException | SQLException e) {
			response.sendRedirect("error.html");
		}
	}

}
