/*
 * BackEnd.java
 */

package org.yvmht.backend;

import java.util.HashMap;
import java.util.Map;
import java.util.concurrent.atomic.AtomicReference;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

import org.yvmht.backend.beans.Bean;
import org.yvmht.backend.beans.UserBean;
import org.yvmht.backend.entities.User;

/**
 * Description.
 *
 * @author Rod Odin
 */
public class BackEnd
{
// Constructors --------------------------------------------------------------------------------------------------------

	protected BackEnd()
	{
		entityManagerFactory = Persistence.createEntityManagerFactory("org.youvote.backend.jpa");
		defaultEntityManager = entityManagerFactory.createEntityManager();

		beans.put(User.class.getName(), new UserBean(defaultEntityManager));
		//...
	}

// Initialization/Finalization -----------------------------------------------------------------------------------------

	protected void finalize() throws Throwable
	{
		defaultEntityManager.close();
		entityManagerFactory.close();
		super.finalize();
	}

// Getters/Setters -----------------------------------------------------------------------------------------------------

	public static BackEnd getDefaultBackend()
	{
		if (DEFAULT_BACKEND.get() == null)
			DEFAULT_BACKEND.compareAndSet(null, new BackEnd());
		return DEFAULT_BACKEND.get();
	}

	@SuppressWarnings("unchecked")
	public <Entity> Bean<Entity> getBean(Class<Entity> entityClass)
	{
		return (Bean<Entity>)beans.get(entityClass.getName());
	}

// Attributes ----------------------------------------------------------------------------------------------------------

	private static final AtomicReference<BackEnd> DEFAULT_BACKEND = new AtomicReference<BackEnd>();

	private EntityManagerFactory entityManagerFactory;
	private EntityManager defaultEntityManager;

	private Map<String, Bean<?>> beans = new HashMap<String, Bean<?>>();
}
