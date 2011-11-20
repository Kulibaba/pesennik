/*
 * User.java
 */

package org.yvmht.backend.entities;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;

import org.hibernate.annotations.GenericGenerator;


/**
 * Description.
 *
 * @author Rod Odin
 */
@Entity
@Table( name = "USERS" )
public class User
{
	private Long id;
	private String username;
	private String passwordSignature;

	/**
	 * Required for Hibernate
	 */
	public User()
	{
	}

	/**
	 * For application use.
	 * @param username the username (login)
	 */
	public User(String username)
	{
		this.username = username;
	}

	@Id
	@Column(name="id")
	@GeneratedValue(generator="increment")
	@GenericGenerator(name="increment", strategy = "increment")
	public Long getId()
	{
		return id;
	}

	private void setId(Long id)
	{
		this.id = id;
	}

	@Column(name="username")
	public String getUsername()
	{
		return username;
	}

	public void setUsername(String username)
	{
		this.username = username;
	}

	@Column(name="password_signature")
	public String getPasswordSignature()
	{
		return passwordSignature;
	}

	public void setPasswordSignature(String passwordSignature)
	{
		this.passwordSignature = passwordSignature;
	}
}
