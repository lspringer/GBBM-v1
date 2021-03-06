<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BeerTable extends Doctrine_Table
{
	public function getByIdForeignQuery(array $ids)
	{
		$q = self::getExclusionQuery($ids)
			->leftJoin('b.Brewery bw')
			->andWhere('bw.country != ?', 'US');

		return $q;
	}

	public function getExclusionQuery(array $ids)
	{
		$q = $this->createQuery('b')
			->select('b.id')
			->whereNotIn('b.id', $ids);

		return $q;
	}
	
	public function getByStyleQuery(array $styles)
	{
		$q = $this->createQuery('b')
			->leftJoin('b.Style s')
			->leftJoin('b.Brewery br')
			->whereIn('s.id', $styles)
			->orderBy('b.label ASC');
			
		return $q;
	}
}