<?php
class CAllCloudStorageBucket
{
	protected/*.int.*/$_ID = 0;
	/**
	 * @param double $file_size
	 * @param int $file_count
	 * @return CDBResult
	*/
	public function SetFileCounter($file_size, $file_count)
	{
		global $DB, $CACHE_MANAGER;
		$res = $DB->Query("
			UPDATE b_clouds_file_bucket
			SET FILE_COUNT = ".intval($file_count)."
			,FILE_SIZE = ".roundDB($file_size)."
			WHERE ID = ".$this->GetActualBucketId()."
		");

		if(CACHED_b_clouds_file_bucket !== false)
			$CACHE_MANAGER->CleanDir("b_clouds_file_bucket");
		return $res;
	}
	/**
	 * @param double $file_size
	 * @return CDBResult
	*/
	function IncFileCounter($file_size = 0.0)
	{
		global $DB, $CACHE_MANAGER;
		$res = $DB->Query("
			UPDATE b_clouds_file_bucket
			SET FILE_COUNT = FILE_COUNT + 1
			,FILE_SIZE = FILE_SIZE + ".roundDB($file_size)."
			WHERE ID = ".$this->GetActualBucketId()."
		");

		if (defined("BX_CLOUDS_COUNTERS_DEBUG"))
			\CCloudsDebug::getInstance()->endAction();

		if(CACHED_b_clouds_file_bucket !== false)
			$CACHE_MANAGER->CleanDir("b_clouds_file_bucket");
		return $res;
	}
	/**
	 * @param double $file_size
	 * @return CDBResult
	*/
	function DecFileCounter($file_size = 0.0)
	{
		global $DB, $CACHE_MANAGER;
		$res = $DB->Query("
			UPDATE b_clouds_file_bucket
			SET FILE_COUNT = if(FILE_COUNT - 1 >= 0, FILE_COUNT - 1, 0)
			,FILE_SIZE = if(FILE_SIZE - ".roundDB($file_size)." >= 0, FILE_SIZE - ".roundDB($file_size).", 0)
			WHERE ID = ".$this->GetActualBucketId()."
		");

		if (defined("BX_CLOUDS_COUNTERS_DEBUG"))
			\CCloudsDebug::getInstance()->endAction();

		if(CACHED_b_clouds_file_bucket !== false)
			$CACHE_MANAGER->CleanDir("b_clouds_file_bucket");
		return $res;
	}

	protected function GetActualBucketId()
	{
		if (
			$this->isFailoverEnabled() && CCloudFailover::IsEnabled()
			&& $this->arBucket["FAILOVER_ACTIVE"] === 'Y'
			&& $this->arBucket["FAILOVER_BUCKET_ID"] > 0
		)
			return $this->arBucket["FAILOVER_BUCKET_ID"];
		else
			return $this->arBucket["ID"];
	}
}
