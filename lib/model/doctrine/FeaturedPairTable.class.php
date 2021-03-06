<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FeaturedPairTable extends Doctrine_Table
{
	public function getJoinedQuery()
	{
		$q = $this->createQuery('fp')
			->leftJoin('fp.Movie m')
			->leftJoin('fp.Beer b');

		return $q;
	}

	public function getExclusionQuery(array $bIds, array $mIds)
	{
		$q = $this->createQuery('fp')
			->select('fp.id')
			->whereNotIn('fp.beer_id', $bIds)
			->andWhereNotIn('fp.movie_id', $mIds);

		return $q;
	}
}