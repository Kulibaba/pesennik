/*
 * Bean.java
 */

package org.yvmht.backend.beans;

import java.util.List;

/**
 * Not a real EJB3 bean, but a primitive substitute.
 *
 * @author Rod Odin
 */
public interface Bean <Entity>
{
	Entity create();
	Entity save(Entity entity);
	void delete(Entity entity);

	List<Entity> get(Object... criteria);
}
