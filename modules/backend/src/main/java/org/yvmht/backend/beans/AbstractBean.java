/*
 * AbstractBean.java
 */

package org.yvmht.backend.beans;

import javax.persistence.EntityManager;

/**
 * Not a real EJB3 bean, but a primitive substitute.
 *
 * @author Rod Odin
 */
public abstract class AbstractBean <Entity>
	implements Bean<Entity>
{
// Constructors --------------------------------------------------------------------------------------------------------

	protected AbstractBean(EntityManager entityManager)
	{
		this.entityManager = entityManager;
	}

// Getters/Setters -----------------------------------------------------------------------------------------------------

	public EntityManager getEntityManager()
	{
		return entityManager;
	}

// Attributes ----------------------------------------------------------------------------------------------------------

	private EntityManager entityManager;

    @Override
    public Entity create() {
        return null;  //To change body of implemented methods use File | Settings | File Templates.
    }
}

