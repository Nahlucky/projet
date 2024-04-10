package util;

import java.sql.SQLException;
import java.sql.Statement;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

public class Database {
	private String url;
	private String user;
	private String password;
	
	private Connection connexion = null;
    private Statement statement = null;
    private ResultSet resultSet = null;
    private PreparedStatement preparedStatement = null;
	
	public Database(String dburl, String dbuser, String dbpassword) {
		this.url = dburl;
		this.user = dbuser;
		this.password = dbpassword;
	}
	public Database() {
		this.url = "jdbc:mysql://localhost:3306/note";
		this.user = "unote";
		this.password = "unotepass";
	}
	
	public ResultSet returnDataRequest(String req) throws  SQLException{
		try {
			this.statement = this.connexion.createStatement();
			this.resultSet = this.statement.executeQuery(req);
		}
		catch(SQLException e) {
			System.out.println("Erreur execution de requete");
		}
		
		return this.resultSet;
	}
	
	public boolean connect() throws ClassNotFoundException, SQLException{
		Class.forName("com.mysql.cj.jdbc.Driver");
		this.connexion = DriverManager.getConnection(this.url, this.user, this.password);
		
		if(this.connexion != null) {
			return true;
		}
		else {
			return false;
		}
		
	}
	
	public ResultSet getResultSet() {
		return this.resultSet;
	}
	public Statement getStatement() {
		return this.statement;
	}
	public Connection getConnection() {
		return this.connexion;
	}
	public PreparedStatement getPreparedStatement() {
		return this.preparedStatement;
	}
	
	public void setResultSet(ResultSet r) {
		this.resultSet = r;
	}
	public void setStatement(Statement s) {
		this.statement = s;
	}
	public void setConnection(Connection c) {
		this.connexion = c;
	}
	public void setPreparedStatement(PreparedStatement p) {
		this.preparedStatement = p;
	}
}
