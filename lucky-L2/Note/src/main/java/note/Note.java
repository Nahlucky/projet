package note;

import java.sql.SQLException;

import util.Database;

public class Note {
	private int id = -1;
	private String titre;
	private String corps;
	private Database db = new Database();
	
	public Note(String t, String c) throws ClassNotFoundException, SQLException {
		this.titre = t;
		this.corps = c;

		db.connect();
	}
	
	boolean join() throws ClassNotFoundException, SQLException {
		return db.connect();
	}
	
	boolean update() throws SQLException {
		int conf = 0;
		if(id > 0) {
			try {
				String req = "UPDATE liste SET titre=? , corps=? WHERE id=?";
				db.setPreparedStatement(db.getConnection().prepareStatement(req));
				db.getPreparedStatement().setString(1, this.titre);
				db.getPreparedStatement().setString(2, this.corps);
				db.getPreparedStatement().setInt(3, this.id);
				
				conf = db.getPreparedStatement().executeUpdate();
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}
		
		if(conf > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	boolean delete() throws SQLException{
		int conf = 0;
		
		try {
			String req = "DELETE FROM liste WHERE titre=?";
			db.setPreparedStatement(db.getConnection().prepareStatement(req));
			db.getPreparedStatement().setString(1, this.titre);
			
			conf = db.getPreparedStatement().executeUpdate();
		} catch (SQLException e) {
			e.printStackTrace();
		}
	
		if(conf > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	boolean save() throws SQLException {
		int conf = 0;
		try {
			String req = "INSERT INTO liste (titre, corps) VALUES (?, ?)";
			db.setPreparedStatement(db.getConnection().prepareStatement(req));
			db.getPreparedStatement().setString(1, this.titre);
			db.getPreparedStatement().setString(2, this.corps);
			
			conf = db.getPreparedStatement().executeUpdate();
		}
		catch(SQLException e) {
			System.out.println("Tsy tafiditra");
		}
		
		if(conf > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public void setId(int idValue) {
		this.id = idValue;
		System.out.println("id:" + this.id);
	}
	
	public int getId() {
		return this.id;
	}
	public String getTitre() {
		return this.titre;
	}
	public String getCorps() {
		return this.corps;
	}
}
