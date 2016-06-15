<?php

namespace CrashTest\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="Articles")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ArticleID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $articleID;

    /**
     * @var string
     *
     * @ORM\Column(name="ArticleTitle", type="string", nullable=false, length=255)
     */
    private $articleTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="ArticleContent", type="text", nullable=false)
     */
    private $articleContent;


    /**
     * @var string
     *
     * @ORM\Column(name="ArticleAuthor", type="string", nullable=true, length=255)
     */
    private $articleAuthor;

    /**
     * @var \Datetime
     *
     * @ORM\Column(name="ArticleCreationDate", type="datetime", nullable=false)
     */
    private $articleCreationDate;

    /**
     * @var \Datetime
     *
     * @ORM\Column(name="ArticleLastUpdate", type="datetime", nullable=false)
     */
    private $articleLastUpdate;

    /**
     * @ORM\PrePersist()
     */
    public function updateDates()
    {
        $this->articleCreationDate = new \DateTime();
        $this->articleLastUpdate = new \DateTime();
    }

    /**
     * @ORM\PreUpdate()
     */
    public function updateLastUpdate()
    {
        $this->articleLastUpdate = new \DateTime();
    }

    /**
     * Get articleID
     *
     * @return integer
     */
    public function getArticleID()
    {
        return $this->articleID;
    }

    /**
     * Set articleTitle
     *
     * @param string $articleTitle
     *
     * @return Article
     */
    public function setArticleTitle($articleTitle)
    {
        $this->articleTitle = $articleTitle;

        return $this;
    }

    /**
     * Get articleTitle
     *
     * @return string
     */
    public function getArticleTitle()
    {
        return $this->articleTitle;
    }

    /**
     * Set articleContent
     *
     * @param string $articleContent
     *
     * @return Article
     */
    public function setArticleContent($articleContent)
    {
        $this->articleContent = $articleContent;

        return $this;
    }

    /**
     * Get articleContent
     *
     * @return string
     */
    public function getArticleContent()
    {
        return $this->articleContent;
    }

    /**
     * Set articleAuthor
     *
     * @param string $articleAuthor
     *
     * @return Article
     */
    public function setArticleAuthor($articleAuthor)
    {
        $this->articleAuthor = $articleAuthor;

        return $this;
    }

    /**
     * Get articleAuthor
     *
     * @return string
     */
    public function getArticleAuthor()
    {
        return $this->articleAuthor;
    }

    /**
     * Set articleCreationDate
     *
     * @param \DateTime $articleCreationDate
     *
     * @return Article
     */
    public function setArticleCreationDate($articleCreationDate)
    {
        $this->articleCreationDate = $articleCreationDate;

        return $this;
    }

    /**
     * Get articleCreationDate
     *
     * @return \DateTime
     */
    public function getArticleCreationDate()
    {
        return $this->articleCreationDate;
    }

    /**
     * Set articleLastUpdate
     *
     * @param \DateTime $articleLastUpdate
     *
     * @return Article
     */
    public function setArticleLastUpdate($articleLastUpdate)
    {
        $this->articleLastUpdate = $articleLastUpdate;

        return $this;
    }

    /**
     * Get articleLastUpdate
     *
     * @return \DateTime
     */
    public function getArticleLastUpdate()
    {
        return $this->articleLastUpdate;
    }
}
