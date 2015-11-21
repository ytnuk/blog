--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: blog_post_category; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE blog_post_category (
    id integer NOT NULL,
    post_id integer NOT NULL,
    category_id integer NOT NULL,
    "primary" boolean
);


--
-- Name: blog_post_category_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE blog_post_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: blog_post_category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE blog_post_category_id_seq OWNED BY blog_post_category.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY blog_post_category ALTER COLUMN id SET DEFAULT nextval('blog_post_category_id_seq'::regclass);


--
-- Name: blog_post_category_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY blog_post_category
    ADD CONSTRAINT blog_post_category_id PRIMARY KEY (id);


--
-- Name: blog_post_category_post_id_category_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY blog_post_category
    ADD CONSTRAINT blog_post_category_post_id_category_id UNIQUE (post_id, category_id);


--
-- Name: blog_post_category_post_id_primary; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY blog_post_category
    ADD CONSTRAINT blog_post_category_post_id_primary UNIQUE (post_id, "primary") DEFERRABLE INITIALLY DEFERRED;


--
-- Name: blog_post_category_category_id; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX blog_post_category_category_id ON blog_post_category USING btree (category_id);


--
-- Name: blog_post_category_post_id; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX blog_post_category_post_id ON blog_post_category USING btree (post_id);


--
-- Name: blog_post_category_category_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY blog_post_category
    ADD CONSTRAINT blog_post_category_category_id_fkey FOREIGN KEY (category_id) REFERENCES blog_category(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: blog_post_category_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY blog_post_category
    ADD CONSTRAINT blog_post_category_post_id_fkey FOREIGN KEY (post_id) REFERENCES blog_post(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

