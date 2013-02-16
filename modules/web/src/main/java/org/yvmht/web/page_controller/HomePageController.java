/*
 * HomePageController.java
 */

package org.yvmht.web.page_controller;

import java.util.Date;
import java.util.Map;
import java.util.concurrent.atomic.AtomicBoolean;
import java.util.concurrent.atomic.AtomicReference;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.yvmht.backend.BackEnd;
import org.yvmht.backend.beans.UserBean;
import org.yvmht.backend.entities.User;
import org.yvmht.generic.utils.DateTimeUtils;

/**
 * The backed bean for <code>homePage.xhtml</code>.
 *
 * @author Rod Odin
 */
@ManagedBean(name = "homePage")
@RequestScoped
public class HomePageController
{
	final static Logger LOG = LoggerFactory.getLogger(HomePageController.class);

// Constructors --------------------------------------------------------------------------------------------------------

	 public HomePageController()
	{
		currTitle = "You Vote Home Page" ;
	}

// Controller methods --------------------------------------------------------------------------------------------------

	///**
	//* The method linked to the form submit action.
	//*/
	//public void login(ActionEvent actionEvent)
	//{
	//	// TODO: Do something, and then return the page name to navigated to
	//}

	/**
	 * The method linked to the form submit action.
	 */
	public String send()
	{
		LOG.info("send 1: username=" + username + ", newUserAdded=" + newUserAdded);

		final UserBean userBean = (UserBean) BackEnd.getDefaultBackend().getBean(User.class);
		final Map<String,User> allUsers = userBean.getAllUsersMappedByUsername();
		User user = allUsers.get(username);
		if (user == null)
		{
			user = userBean.create();
			user.setUsername(username);
			user.setPasswordSignature(password);
			user = userBean.save(user);
			newUserAdded.set(true);

			//_______________
			username = user.getUsername();
			this.user.set(user);   //?
		}
		else
		{
			newUserAdded.set(false);
			if (user.getPasswordSignature().compareTo(password)!=0)
				return  "salutationPage.xhtml";
		}

		LOG.info("send 2: username=" + username + ", newUserAdded=" + newUserAdded);
		LOG.info("MYsend 3: username=" + username + ", newUserAdded=" + newUserAdded);

		return "salutationPage.xhtml";
	}

// Getters/Setters -----------------------------------------------------------------------------------------------------

	public String getUsername()
	{
		LOG.info("getUsername: username=" + username);
		return username;
	}

	public void setUsername(String username)
	{
		this.username = username;
		LOG.info("setUsername: username=" + username);
	}

    public String getPassword()
	{
		LOG.info("getPassword: password=" + username);
		return username;
	}

	public void setPassword(String password)
	{
		this.password = password;
		LOG.info("setPassword: password=" + password);
	}

    public String getCurrTitle()
	{
		LOG.info("getСurrTitle: currTitle=" + currTitle);
		return currTitle;
	}

	public void setCurrTitle(String currTitle)
	{
		this.currTitle = currTitle;
		LOG.info("setCurrTitle: currTitle=" + currTitle);
	}

	public boolean getNewUserAdded()
	{
		return newUserAdded.get();
	}

	public String getNow()
	{
		return DateTimeUtils.fromDateTime(new Date());
	}

	private String username;
	private String password;
	private String currTitle;
	private AtomicReference<User> user = new AtomicReference<User>();
	private AtomicBoolean newUserAdded = new AtomicBoolean();
}
